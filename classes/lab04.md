## Konstruktory

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei konstruktora,
* przedstawienie różnic w ustawianiu stanu obiektu przez konstruktor, metodę oraz publiczne pole
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań na ocenę.

### Konstruktor
Oto kostka do gry:
```
class Dice
{
    public int roll() {
        return rand(1, 6)
    }
}

Dice dice = new Dice()
dice.roll()
# 3
dice.roll()
# 5
```

Tradycyjnie kostki do gry mają sześć ścian, ale w niektórych grach występują również inne warianty. Jak moglibyśmy zamodelować różnorakie wielościenne kostki? Pierwsze co mogłoby przyjść na myśl to przekazanie liczby `sides` jako parametru do metody `roll(Integer sides)` i zwrócenie `return rand(1, sides)`. Oczywiście zadziałałoby to poprawnie, ale nie miałoby sensu z punktu widzenia programowania obiektowego i modelowania rzeczywistego świata. Bo jak często kostka zmienia liczbę swoich ścian podczas gry? Raczej nigdy.

To w takim razie można byłoby dodać pole `public Integer sides`, pozbyć się parametru w `roll()` i losować liczbę między 1 a liczbą ścian określoną w polu obiektu: `return rand(1, this.sides)`? Też zadziała, ale w każdym momencie każdy może dopisać `dice.sides = 20` i znów zmienić w trakcie gry liczbę ścian.

A więc zostaje nam konstruktor, czyli specjalna metoda, która jest wywoływana podczas tworzenia instancji klasy. Domyślnie każda klasa ma konstruktor, jednakże jest on bezparametryczny i "pusty", a wywołuje się go przy tworzeniu obiektu: `new Dice()`. Spójrzmy na poniższą klasę:

```
class Dice
{
    public Integer sides
    
    public Dice(Integer sides) {
        this.sides = sides
    }
    
    public int roll() {
        return rand(1, this.sides)
    }
}

Dice dice = new Dice(20)
dice.roll()
# 16
```

Tutaj jest już prawie świetnie względem naszych potrzeb. Konstruktor przyjmuje liczbę określającą liczbę ścian kostki. Jedyne czego brakuje to hermetyzacja tej liczby: jeżeli ustawimy akcesor na `protected` lub `private` to kostka będzie budowana z konkretną liczbą ścian przy inicjalizacji i już nigdy z zewnątrz nie będzie mogło to być zmienione. Dokładnie tak jak to sobie wymyśliliśmy.

Konstruktor oczywiście może przyjąć dowolną liczbę parametrów i zachowuje się jak praktycznie jak każda inna metoda. Jedyną wyraźną różnicą jest to, że nic nie zwraca (i nie można określić zwracanego typu, nawet na `void`). 

### Ustawianie stanu
Wychodzi na to, że stan można ustawić na przynajmniej trzy sposoby:
1. Poprzez bezpośrednią modyfikację wartości pola, co jest teoretycznie najłatwiejsze i najszybsze, ale niesie ze sobą brak jakiejkolwiek kontroli nad wpisywanymi wartościami: 
```
Dice dice = new Dice()
dice.sides = 20
```

2. Poprzez setter, czyli zdefiniowaną przez programistę metodę, co umożliwi zastosowanie walidacji i kontrolę wprowadzanych danych (tutaj: chociażby sprawdzenie czy `sides` nie jest wartością ujemną!):
```
Dice dice = new Dice()
dice.setSides(20)
```

3. Poprzez konstruktor, co niesie za sobą wszystkie zalety korzystania ze specjalistycznej metody, a ponadto pozwala na zbudowanie obiektu w taki sposób jak to sobie zaplanowaliśmy:
```
Dice dice = new Dice(20)
```

Opcja z publicznym polem i setterem na tym przykładzie jest na tyle problematyczna, że wszyscy programiści w projekcie będą musieli wiedzieć, że trzeba ich użyć. Program by się wykrzaczył, gdyby ktoś wywołał `roll()`, a `sides` nie zostałoby uprzednio ustanowione. Dlatego warto korzystać z ustawiania stanu obiektu poprzez konstruktor, ponieważ zmniejsza to możliwość popełnienia głupiego błędu. Bez odpowiedniej hermetyzacji nawet najlepiej opisany konstruktor nie zabezpieczy nas przed najgłupszym przeoczeniem.

### Analiza przykładowego zadania
Zadanie składa się z trzech części: klasy opisującej gracza, funkcji losującej gracza spośród innych graczy oraz procesu dodania graczy i "pojedynkowania się" między nimi:
```
class Dice
{
```

Zadanie powinno być zrozumiałe przez wszystkich. Kolejno:
* 

W każdym języku będzie to wyglądało nieco inaczej, ale warto zwrócić uwagę na pewne niuanse:
* 

### Zadanie do wykonania
Należy rozszerzyć program o następujące funkcjonalności:
* 

Wykonane zadanie należy dodać do swojego repozytorium w katalogu `lab04`.

### Uruchamianie zadań
Wszystkie narzędzia są skonteneryzowane i gotowe do użycia bezpośrednio poprzez Dockera. Chętni studenci mogą oczywiście uruchamiać zadania w środowiskach lokalnych.

#### Java
```
docker compose run java javac ./exercises/lab04/*.java
docker compose run java java -cp ./exercises/lab04 lab04
```

#### PHP
```
docker compose run php php ./exercises/lab04/lab04.php
```

#### Python
```
docker compose run python python ./exercises/lab04/lab04.py
```
