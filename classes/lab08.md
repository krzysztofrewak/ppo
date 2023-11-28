## Klasy abstrakcyjne

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei funkcji anonimowych,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Funkcja jako parametr innej funkcji

### Analiza przykładowego zadania
Zadanie składa się z kilku części: 
* 

Zadanie powinno być zrozumiałe przez wszystkich. Kolejno:
* 

### Zadanie do wykonania
Należy rozszerzyć program o następujące funkcjonalności:
* należy zaprojektować parking, na który mogą wchodzić lub wjeżdżać następujące obiekty:

Nad czym warto się zastanowić?
* 

Wykonane zadanie należy dodać do swojego repozytorium w katalogu `lab08`.

### Uruchamianie zadań
Wszystkie narzędzia są skonteneryzowane i gotowe do użycia bezpośrednio poprzez Dockera. Chętni studenci mogą oczywiście uruchamiać zadania w środowiskach lokalnych.

#### Java
```
docker compose run java javac ./exercises/lab08/java/Main.java ./exercises/lab08/java/lab08/*.java
docker compose run java java -cp ./exercises/lab08/java Main
```

#### PHP
```
docker compose run php composer install --working-dir=./exercises/lab08/php
docker compose run php php ./exercises/lab08/php/index.php
```

#### Python
```
docker compose run python python ./exercises/lab08/python/main.py
```
