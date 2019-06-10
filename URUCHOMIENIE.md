# Uruchomienie aplikacji

Strona dostępna jest na internecie za pośrednictwem platformy Heroku.
Celem uruchomienia strony wystarczy wejść na wskazany link: 

https://aqueous-gorge-93891.herokuapp.com

UWAGA: Pierwsze uruchomienie strony może potrwać około 30 sekund.
Opóźnienie ma miejsce przez platformę wybudzającą serwer back end strony.

## Baza danych 

Celem dostępu do bazy danych aplikacji (której backup dostępny jest w pliku 
`dump.sql` ) należy w terminalu wywołać komendę

`mysql -u ba7a0b3fdf9ae0 -h us-cdbr-iron-east-02.cleardb.net -p heroku_09d49274fea8a0d`
hasło: `526d0ff2`