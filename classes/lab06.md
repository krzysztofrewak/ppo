## Interfejsy

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei interfejsu w ujęciu polimorfizmu,
* przedstawienie idei interfejsu w ujęciu kontraktu,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Interfejsy a polimorfizm
Interfejs jest odpowiedzią świata paradygmatu obiektowego na brak wielokrotnego dziedziczenia. Idea jest nieco bardziej skomplikowana niż przy dziedziczeniu, ponieważ dotyczy pewnego poziomu abstrakcji, ale spróbujmy zrozumieć to na przykładzie:
```
class Car {}
class Truck extends Car {}
class Bike {}

ParkingLot parkingLot = new ParkingLot()
parkingLot.letIn(new Car())
parkingLot.letIn(new Truck())
parkingLot.letIn(new Bike())
```

Jak musiałaby wyglądać sygnatura metody `letIn()` w klasie `ParkingLot`, aby mogła przyjąć zarówno obiekty klasy `Car`, `Truck`, jak i `Bike`? Pierwsze dwa są ze sobą związane dziedziczeniem, więc polimorfizm załatwia tutaj sprawę, ale co z rowerem? Przecież nie możemy dziedziczyć roweru po samochodzie ani samochodu po rowerze, bo są to całkowicie różne pojazdy.

W niektórych językach programowania takich jak Java można byłoby stworzyć dwie metody `letIn(Car car)` oraz `letIn(Bike bike)`, ale byłoby to rozwiązanie tymczasowe i mało odporne na rozszerzanie się funkcjonalności programu ("a co gdyby takich klas było 15?). W nowszych wersjach PHP można byłoby zastosować union type: `letIn(Car|Bike $bike)`, ale niosłoby to dokładnie te same problemy.

Z pomocą przychodzi idea interfejsu:
```
interface Vehicle {}

class Car implements Vehicle {}
class Truck extends Car {}
class Bike implements Vehicle {}

class ParkingLot {
    public void letIn(Vehicle vehicle) {
        // (...)
    }
}

ParkingLot parkingLot = new ParkingLot()
parkingLot.letIn(new Car())
parkingLot.letIn(new Truck())
parkingLot.letIn(new Bike())
```

Interfejs nie jest klasą (a przynajmniej nie jest nią w większości języków programowania), ale osobną strukturą w języku, która może być implementowana do innych klas. Jeżeli dana klasa implementuje dany interfejs, należy wszystkie jej obiekty rozumieć również jako - w uproszczeniu - "instancje tego interfejsu". Zatem wybrana metoda może oczekiwać obiektu klasy implementującej oczekiwany interfejs bez precyzowania co to będzie za klasa.

Takie podejście sprawdzi się szczególnie w przypadkach, gdzie z różnych powodów nie możemy wykorzystać dziedziczenia, a gdzie chcielibyśmy nadać wspólną "etykietę" kilku klasom. 

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
