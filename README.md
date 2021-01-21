# Food Delivery

*Read this in other languages: [English](README.en.md), [Romanian](README.md).*

Proiectul consta in Analiza, proiectarea si implementarea unei baze de date si a aplicatiei web aferente care sa modeleze activitatea unui restaurant online.

## Descrierea cerinteleor si modul de organizare al proiectului

Volumul mare de informaţii existente în cazul unui restaurant de acest tip cu numerosi clienti determina necesitatea fluidizarii fluxurilor de date.
Informatiile de care avem nevoie sunt cele legate de :
- Clienti: datele referitoare la clienti se afla in tabela utilizatori. Dat fiind faptul ca produsele trebuiesc livrate, ne intereseaza numele, prenumele, adresa, telefonul, email-ul utilizatorilor ce se afla intr-un table cu detalii despre utilizatori, detalii_utilizatori.
- Produsele: deoarece sunt mai multe tipuri de produse, acestea se impart in mai multe categorii. Astfel exista o tabela de categorii din care ne intereseaza tipul produsului.
- Cos: pentru ca un utilizator sa aiba acces la produse acesta are nevoie de un cos in care sa adauge produsele dorite.
- Comenzi: in cazul informatiilor despre comenzi, acestea se vor stoca in doua tabele, comenzi si produse_din_comenzi. In tabela de comenzi se inregistreaza data si id-ul utilizatorului respectiv.

## Descrierea cerinteleor si modul de organizare al proiectului
Tabelele din aceasta aplicatie sunt:
- categorii
- produse
- cos
- utilizatori
- detalii_utilizatori
- comenzi
- produse_din_comanda
In proiectarea acestei baze de date s-au identificat tipurile de relatii 1:1, 1:n, n:1 si n:n.

Intre tabelele categorii si produse se intalneste o relatie de tip 1:n, deoarece o categorie poate avea mai multe produse. De exemplu categoria de ’Pizza’ poate avea produse precum ’Pizza Al Tono’ si ’Pizza Superdeluxe’. Reciproca insa nu este valabila, deoarece un produs nu poate sa fie in mai multe categorii. Legatura dintre cele doua tabele este realizata prin campul id_categorie.
Intre utilizatori si produse exista o relatie n:n, deoarece un utilizator poate cumpara mai multe produse, dar acelasi produs poate fi cumparat de mai multi utilizatori. Aceasta relatie este impartita in 2 relatii 1:n si legatura dintre cele doua tabele se realizeaza cu ajutorul tabelei cos care contine cheia primara a fiecarei din cele doua tabele.
Intre utilizatori si detalii_utilizatori exista o relatie 1:1, deoarece un utilizator poate avea un singur set de detalii si detaliile unui utilizator apartin unui singur utilizator. Legatura dintre cele doua tabele se realizaeaza prin campul id_utilizator.
Intre comenzi si utilizatori exista o relatie n:1 pentru ca un utilizator poate face mai multe comenzi, dar o comanda nu poate fi facuta de mai multi utilizatori. Legaura dintre cele doua tabele se realizeaza prin campul id_utilizator.
Intre comenzi si produse exista o renalia n:n, deoarece o comanda poate contine mai multe produse, dar un produs se poate afla in mai multe comenzi. Aceasta relatie este impartita in 2 relatii 1:n si legatura dintre cele doua tabele se realizeaza cu ajutorul tabelei produse_din_comanda care contine cheia primara a fiecarei din cele doua tabele.

## Tehnologii folosite
- PHP
- HTML
- CSS
- Bootstrap Studio
- phpMyAdmin 4.8.5
- MariaDB 10.3.15
- XAMPP

Conexiunea la baza de date se realizeaza prin comanda mysqli_connect();
Accesarea aplicatiei web:
- Se copie fisierul Food_Delivery in C:\xampp\htdocs
- Se creaza in phpMyAdmin o baza de date cu numele antighin
- Se importa scriptul database.sql ce creaza tabelele corespunzatoare
- Se importa scriptul insert.sql ce introduce in tabele informatii
- Aplicatia web se acceseaza din browser prin http://localhost/Food_delivery./

## Structura si inter-relationarea tabelelor
[Persoana](#Persoana)

## Interfata
  - [Data](Baza de date/logical.jpg)
[Diagrama Logica](Baza de date/logical.jpg)
<p align="center">
  <img src="Baza de date/logical.jpg">
</p>
[Diagrama Relationala](Baza de date/relational.jpg)



<p align="center">
  <img src="Baza de date/relational.jpg">
</p>






