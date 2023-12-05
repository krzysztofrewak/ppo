## Wyjątki

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei błędów,
* przedstawienie idei rzucania i łapania wyjątków,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Błędy
W tradycyjnym programie (podobnym do tych, które zrobiliśmy na wszystkich poprzednich zajęciach) wykonywane są kolejne linijki kodu źródłowego (przepisane oczywiście pod spodem przez kompilator na kod maszynowy) od początku do jakiegoś końca. Początek zazwyczaj jest jeden, natomiast końców możemy mieć tyle, ile returnów znajdzie się w kodzie. Po drodze możemy wykorzystać różne struktury takie jak pętle, warunki logiczne czy ekstrakcję fragmentów kodu do funkcji, ale mniej więcej wygląda to zawsze podobnie. 

Czasami niestety program może zostać przerwany w nieoczekiwany sposób i w nieoczekiwanym momencie. Na przykład, gdy spróbujemy w Pythonie skonkatenować string i niestring:
```
Traceback (most recent call last):
  File "/application/./exercises/lab10/python/main.py", line 8, in <module>
    print("test" + 1)
          ~~~~~~~^~~
TypeError: can only concatenate str (not "int") to str
```

Są to błędy (ang. _errors_), które można obsłużyć przede wszystkim poprzez walidację i sanityzację danych. W tym przypadku można byłoby to naprawić choćby rzutowaniem liczba na słowo: `"test" + str(1)`. Z reguły powinniśmy minimalizować liczbę wywoływania takich błędów, gdyż zwykle przerywają one program 

### Wyjątki i ich łapanie
O wiele ciekawszym zagadnieniem są wyjątki (ang. _exceptions_), które z reguły w większości języków programowania można projektować, rzucać oraz łapać.

### Analiza przykładowego zadania
Zadanie składa się z kilku części: 
* 

Zadanie powinno być zrozumiałe przez wszystkich. Kolejno:
* 

### Zadanie do wykonania
Należy rozszerzyć program o następujące funkcjonalności:
* 

Nad czym warto się zastanowić?
* 

Wykonane zadanie należy dodać do swojego repozytorium w katalogu `lab09`.

### Uruchamianie zadań
Wszystkie narzędzia są skonteneryzowane i gotowe do użycia bezpośrednio poprzez Dockera. Chętni studenci mogą oczywiście uruchamiać zadania w środowiskach lokalnych.

#### Java
```
docker compose run java javac ./exercises/lab09/java/Main.java ./exercises/lab09/java/lab09/*.java ./exercises/lab09/java/lab09/**/*.java
docker compose run java java -cp ./exercises/lab09/java Main
```

#### PHP
```
docker compose run php composer install --working-dir=./exercises/lab09/php
docker compose run php php ./exercises/lab09/php/index.php
```

#### Python
```
docker compose run python python ./exercises/lab09/python/main.py
```
