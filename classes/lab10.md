## Refleksje

### Agenda
Przewidywany plan zajęć kształtuje się następująco:
* przedstawienie idei refleksji,
* analiza zadania przykładowego,
* indywidualna praca nad listą zadań.

### Mechanizm refleksji
(...)

### Analiza przykładowego zadania
Zadanie składa się z kilku części: (...)

### Zadanie do wykonania
Należy zaprojektować i zaimplementować program realizujący następujące funkcjonalności:
* program powinien umożliwiać ewidencjonowanie zwierząt w zoo;
* program na starcie powinien załadować plik z indeksem zwierząt, który powinien mieć formatowanie jak poniżej (imię zwierzęcia, gatunek, płeć, wiek); plik docelowy powinien składać się z setki zwierząt spośród przynajmniej 15 gatunków:
```
Sandy;giraffe;f;12
Eenie;zebra;f;5
Meenie;zebra;f;4
Miney;zebra;f;6
Moe;zebra;m;6
Musafa;lion;m;14
Nala;lion;f;6
Simba;lion;m;5
Kong;gorilla;m;24
Abra;dolphin;m;4
Kadabra;dolphin;m;5
Ala;dolphin;f;6
Kazam;dolphin;f;6
```
* program po uruchomieniu powinien czekać na wejście od użytkownika; powinien rozumieć i realizować następujące polecenia:
* * `quit` - wychodzi z programu
* * `list` - wypisuje wszystkie zwierzęta z listy
* * `list x` - wypisuje `x` pierwszych zwierząt z listy
* * `sort x` - sortuje listę zwierząt według filtra `x`, gdzie `x`może mieć wartość `name`, `-name`, `age`, `-age`
* * `filter:group x` - filtruje listę zwierząt według filtra `x`, gdzie `x` może mieć wartość `mammal`, `-mammal`, `reptile`, `-reptile` itd.
* * `filter:gender x` - filtruje listę zwierząt według płci `x`, gdzie `x` może mieć wartość `m` lub `f`
* * `filter:age x` - filtruje listę zwierząt według wieku, gdzie `x` może być liczbą dodatnią lub ujemną (`filter:age 10` zawęzi liczbę do zwierząt mających 10 lat lub więcej; `filter:age -10` - mający 10 lat lub mniej)
* * `clear` - resetuje filtry i sortowania

Nad czym warto się zastanowić?
* może warto stworzyć dodatkowy (konfigurowalny?) podprogram generujący plik wejściowy?

Chętni mogą (...)

Wykonane zadanie należy dodać do swojego repozytorium w katalogu `lab10`.

### Uruchamianie zadań
Wszystkie narzędzia są skonteneryzowane i gotowe do użycia bezpośrednio poprzez Dockera. Chętni studenci mogą oczywiście uruchamiać zadania w środowiskach lokalnych.

#### Java
```
docker compose run java javac ./exercises/lab10/java/Main.java ./exercises/lab10/java/lab10/**/*.java
docker compose run java java -cp ./exercises/lab10/java Main
```

#### PHP
```
docker compose run php composer install --working-dir=./exercises/lab10/php
docker compose run php php ./exercises/lab10/php/index.php
```

#### Python
```
docker compose run python python ./exercises/lab10/python/main.py
```
