## Interfejsy

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei interfejsu w kontekście kontraktu,
* przedstawienie idei interfejsu w kontekście polimorfizmu, 
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Interfejsy, czyli kontrakty


### Analiza przykładowego zadania
Zadanie składa się z dwóch części: 
```
class Car
{
}
```

Zadanie powinno być zrozumiałe przez wszystkich. Kolejno:
* 

W każdym języku będzie to wyglądało nieco inaczej, ale warto zwrócić uwagę na pewne niuanse:
* 

### Zadanie do wykonania
Należy rozszerzyć program o następujące funkcjonalności:
* 

Wykonane zadanie należy dodać do swojego repozytorium w katalogu `lab06`.

### Uruchamianie zadań
Wszystkie narzędzia są skonteneryzowane i gotowe do użycia bezpośrednio poprzez Dockera. Chętni studenci mogą oczywiście uruchamiać zadania w środowiskach lokalnych.

#### Java
```
docker compose run java javac ./exercises/lab06/java/Main.java ./exercises/lab06/java/lab06/*.java
docker compose run java java -cp ./exercises/lab06/java Main
```

#### PHP
```
docker compose run php composer install --working-dir=./exercises/lab06/php
docker compose run php php ./exercises/lab06/php/index.php
```

#### Python
```
docker compose run python python ./exercises/lab06/python/main.py
```
