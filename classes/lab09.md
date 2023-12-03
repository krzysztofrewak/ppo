## Wyjątki

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei rzucania i łapania wyjątków,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Wyjątki

### Łapanie wyjątków

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
