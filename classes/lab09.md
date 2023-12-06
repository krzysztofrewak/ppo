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
* klasy handlera wyjątków,
* klasy odczytującej klawiaturę użytkownika,
* klas wyjątków,
* głównego programu, gdzie handler i reader są zainicjalizowane i uruchomione w oczekiwaniu na interakcję z użytkownikiem.

Zadanie powinno być zrozumiałe przez wszystkich. Kolejno:
* inicjalizowane są klasy `Handler` i `InputReader`
* a następnie, póki zmienna `on` nie zostanie ustawiona na `false`, klasa odczytująca czeka na interakcję z użytkownikiem;
* jeżeli użytkownik nic nie wpisze, wyrzucany jest wyjątek `EmptyStringException` i program czeka dalej na użytkownika;
* jeżeli użytkownik wpisze `:q`, wyrzucany jest wyjątek `ExitCalledException` i program się wyłącza;
* jeżeli użytkownik wpisze `:w`, wyrzucany jest wyjątek `WriteCalledException` i program się wyłącza z wypisanie wyniku;
* jeżeli użytkownik wpisze więcej niż jedną literę, wyrzucany jest wyjątek `MultipleCharactersException` i program czeka dalej na użytkownika;
* jeżeli użytkownik wpisze polski znak, wyrzucany jest wyjątek `ForbiddenCharacterException` i program czeka dalej na użytkownika.

Najważniejsze do zrozumienia jest tutaj to, że cała logika poruszania się po aplikacji została przeniesiona na płaszczyznę wyjątków. To w nich definiowane są wiadomości, które są wyświetlane na interfejsie oraz informacje czy program powinien być kontynuowany po rzuceniu danego wyjątku.

### Zadanie do wykonania
Należy przekształcić program zgodnie z następującym opisem:
* program powinien przyjmować żądania HTTP; mogą być to bardzo uproszczone modele składające się z metody, adresu, tablicy nagłówków (np. `new HttpRequest("get", "/users", ["Auhtorization": "token123"])`)
* program powinien przechowywać listę użytkowników
* program na żądanie `GET /users` bez nagłówka `Auhtorization` powinien zwrócić błąd uwierzytelniania oraz status 401
* program na żądanie `GET /users` powinien zwrócić listę użytkowików oraz status 200
* program na żądanie `GET /users/1` bez nagłówka `Auhtorization` powinien zwrócić błąd uwierzytelniania oraz status 401
* program na żądanie `GET /users/1` (jeżeli użytkownik o id 1 istnieje) powinien zwrócić użytkownika o id 1 oraz status 200
* program na żądanie `GET /users/1` (jeżeli użytkownik o id 1 nie istnieje) powinien zwrócić błąd odnalezienia użytkownika oraz status 404
* program na żądanie `DELETE /users/1` bez nagłówka `Auhtorization` powinien zwrócić błąd uwierzytelniania oraz status 401
* program na żądanie `DELETE /users/1` (jeżeli użytkownik o id 1 istnieje) powinien usunąć użytkownika o id 1 oraz status 200
* program na żądanie `DELETE /users/1` (jeżeli użytkownik o id 1 nie istnieje) powinien zwrócić błąd odnalezienia użytkownika oraz status 404
* program na żądanie `GET /whatever` (czyli jakikolwiek inny adres niż `/users`) powinien zwrócić błąd odnalezienia strony oraz status 404

W pseudokodzie mogłoby wyglądać to tak:
```
Application application = new Application()

HttpRequest request = new HttpRequest("get", "/users")
application.handle(request)
# Error 401
# Unauthorized access.

HttpRequest request = new HttpRequest("get", "/users", ["Auhtorization": "token123"])
application.handle(request)
# Status 200
# | 1 | anowak |
# | 2 | bnowak |
# | 3 | cnowak |
# | 4 | dnowak |

HttpRequest request = new HttpRequest("get", "/users/1")
application.handle(request)
# Error 401
# Unauthorized access.

HttpRequest request = new HttpRequest("get", "/users/1", ["Auhtorization": "token123"])
application.handle(request)
# Status 200
# | 1 | anowak |

HttpRequest request = new HttpRequest("get", "/users/5", ["Auhtorization": "token123"])
application.handle(request)
# Error 404
# Model not found.

HttpRequest request = new HttpRequest("delete", "/users/1")
application.handle(request)
# Error 401
# Unauthorized access.

HttpRequest request = new HttpRequest("delete", "/users/1", ["Auhtorization": "token123"])
application.handle(request)
# Status 200
# User has been deleted

HttpRequest request = new HttpRequest("delete", "/users/1", ["Auhtorization": "token123"])
application.handle(request)
# Error 404
# Model not found.

HttpRequest request = new HttpRequest("get", "/whatever")
application.handle(request)
# Error 404
# Route not found.
```

Warto zastanowić się jak oprogramować powyższe polecenia, tak aby tzw. _happy path_ wykonywał się w aplikacji, a obsługa błędów była ujednolicona dla wszystkich metod.

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
