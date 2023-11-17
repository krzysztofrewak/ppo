## Interfejsy

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei klasy abstrakcyjnej,
* przedstawienie idei metod abstrakcyjnych,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Klasy abstrakcyjne
Klasa abstrakcyjna jest pewnego rodzaju pomostem pomiędzy klasycznymi klasami a interfejsami. Zgodnie z nazwą opisuje pewnego rodzaju abstrakcję: byt, który coś znaczy, ale nie można go w żaden sposób skonkretyzować. W paradygmacie obiektowym będzie to oznaczało, że nie można utworzyć instancji klasy abstrakcyjnej.

Po co nam klasa, na podstawie której nie można utworzyć żadnego obiektu? Ano, chociażby po to, aby mogła służyć jako ogólny zbiór funkcjonalności, które otrzymają inne klasy poprzez dziedziczenie. Zresztą przykład powie najwięcej:

```
abstract class Vehicle {
    public void run() {
        if(this.checkIfCanRun()) {
            this.proceed()
        }
    }
    
    abstract protected bool checkIfCanRun()
    abstract protected void proceed()
}
```

Mamy tutaj abstrakcyjną klasę `Vehicle`, która dostarczy swoim dzieciom publiczną metodą `run()`, która jest nieco bardziej skomplikowana: sprawdza najpierw metodę `checkIfCanRun()`, a jeżeli ta zwróci `true`, wywoływana jest metoda `proceed()`. W tym przypadku wiemy, że każdy pojazd będzie mógł pojechać w ujednolicony sposób, ale każdy pojazd będzie mógł to zaimplementować po swojemu. I przykładowo: rower będzie miał całkowicie inny sposób jazdy niż samochód:

```
class Bike extends Vehicle {
    protected bool checkIfCanRun() {
        return not this.isLocked
    }
    
    protected void proceed() {
        this.waitForPedaling()
    }
}


class Car extends Vehicle {
    protected bool checkIfCanRun() {
        return this.hasEnoughFuel()
            and this.hasChargedBattery()
            and this.hasKeyTurned() 
    }
    
    protected void proceed() {
        this.activateCircuit()
        this.turnStater()
        this.injectFuel()
        this.ignite()
    }
}
```

Żeby w pełni zobrazować sobie problem, warto zastanowić się nad przykładem drogi publicznej, po której jeżdżą pojazdy. Wiemy, że jeżdżą po niej samochody i rowery oraz wiemy, że mogą one jakoś wywoływać metodę `run()`, ale bardzo łatwo nam rozróżnić jedno od drugiego. Raczej nikt nie mówi: *o, pojazd wymusił mi pierwszeństwo*, a raczej sprecyzujemy dokładniej, że *o, samochód wymusił mi pierwszeństwo*. Nie powiemy też policjantowi, że *pojazd nas potrącił*, a będziemy starali się powiedzieć coś dokładniejszego.

Siłą rzeczy klasy opisane jako `abstract` nie mogą być również opisane jako `final`.

### Metody abstrakcyjne
Metoda abstrakcyjna to nic innego niż kolejny rodzaj kontraktu, coś podobnego do interfejsu. Łatwo ją zidentyfikować poprzez słowo kluczowe `abstract` przed akcesorem oraz brak ciała funkcji, czyli znowu podobnie jak sygnatury metod w interfejsach. 

Największą i zasadniczą różnicą jest to, że metoda abstrakcyjna nie musi być publiczna, ponieważ nie jest publicznym kontraktem. Może być chroniona (`protected`), co może być przydatne, gdy chcemy już zaplanować użycie tej motedy w innej metodzie, ale nie chcemy jej enkapsulować. Dokładnie taki scenariusz został przedstawiony powyżej z założeniem, że `run()` wywołuje `checkIfCanRun()` i `proceed()`, ale metod tych faktycznie w klasie `Vehicle` nie ma.

Tutaj ważna rzecz do zapamiętania: jeżeli klasa posiada przynajmniej jedną metodę abstrakcyjną, wówczas sama musi też być oznaczona jako abstrakcyjna. Oczywiście nie wyklucza to sytuacji, w której może istnieć klasa abstrakcyjna bez żadnych metod abstrakcyjnych. Wymuszenie abstrakcji klasy raczej zostanie nam podpowiedziane przez każde sensowne IDE.

### Analiza przykładowego zadania
Zadanie składa się z kilku części: 

Zadanie powinno być zrozumiałe przez wszystkich. Kolejno:
* 

W każdym języku będzie to wyglądało inaczej, ale warto zwrócić uwagę na większe różnice:
* 

### Zadanie do wykonania
Należy rozszerzyć program o następujące funkcjonalności:
* 

Nad czym warto się zastanowić?
* 

Wykonane zadanie należy dodać do swojego repozytorium w katalogu `lab07`.

### Uruchamianie zadań
Wszystkie narzędzia są skonteneryzowane i gotowe do użycia bezpośrednio poprzez Dockera. Chętni studenci mogą oczywiście uruchamiać zadania w środowiskach lokalnych.

#### Java
```
docker compose run java javac ./exercises/lab07/java/Main.java  ./exercises/lab07/java/lab07/*.java ./exercises/lab07/java/lab07/**/*.java
docker compose run java java -cp ./exercises/lab07/java Main
```

#### PHP
```
docker compose run php composer install --working-dir=./exercises/lab07/php
docker compose run php php ./exercises/lab07/php/index.php
```

#### Python
```
docker compose run python python ./exercises/lab07/python/main.py
```
