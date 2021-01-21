# Food Delivery

*Read this in other languages: [English](README.en.md), [Romanian](README.md).*

Proiectul constă în analiza, proiectarea și implementarea unei baze de date și a aplicației web aferente care să modeleze activitatea unui restaurant online.

## Modul de organizare a proiectului

Volumul mare de informaţii existente în cazul unui restaurant de acest tip cu numeroși clienți determină necesitatea fluidizarii fluxurilor de date.
Informațiile de care avem nevoie sunt cele legate de :
- Clienți: datele referitoare la clienți se află în tabela utilizatori. Dat fiind faptul că produsele trebuiesc livrate, ne intereseaza numele, prenumele, adresa, telefonul și email-ul utilizatorilor ce se află într-un tabel cu detalii despre utilizatori, detalii_utilizatori.
- Produsele: deoarece sunt mai multe tipuri de produse, acestea se împart în mai multe categorii. Astfel există o tabelă de categorii din care ne interesează tipul produsului.
- Coș: pentru ca un utilizator să aibă acces la produse, acesta are nevoie de un coș în care să adauge produsele dorite.
- Comenzi: în cazul informațiilor despre comenzi, acestea se vor stoca în două tabele, comenzi și produse_din_comenzi. În tabela de comenzi se înregistrează data si id-ul utilizatorului respectiv.

## Modul de organizare a proiectului

Tabelele din această aplicație sunt:
- categorii
- produse
- cos
- utilizatori
- detalii_utilizatori
- comenzi
- produse_din_comanda

În proiectarea acestei baze de date s-au identificat tipurile de relatii 1:1, 1:n, n:1 si n:n.

Între tabelele categorii și produse se întâlnește o relație de tip 1:n, deoarece o categorie poate avea mai multe produse. De exemplu, categoria de ’Pizza’ poate avea produse precum ’Pizza Al Tono’ și ’Pizza Superdeluxe’. Reciproca însă nu este valabilă, deoarece un produs nu poate să fie în mai multe categorii. Legatura dintre cele două tabele este realizată prin câmpul id_categorie.
Între utilizatori și produse există o relație n:n, deoarece un utilizator poate cumpăra mai multe produse, dar același produs poate fi cumpărat de mai mulți utilizatori. Această relație este împărțită în 2 relații 1:n și legatura dintre cele două tabele se realizează cu ajutorul tabelei cos care contine cheia primară a fiecarei din cele doua tabele.
Între utilizatori și detalii_utilizatori există o relație 1:1, deoarece un utilizator poate avea un singur set de detalii și detaliile unui utilizator aparțin unui singur utilizator. Legatura dintre cele două tabele se realizaează prin câmpul id_utilizator.
Între comenzi și utilizatori există o relație n:1 pentru că un utilizator poate face mai multe comenzi, dar o comandă nu poate fi făcută de mai mulți utilizatori. Legaura dintre cele două tabele se realizează prin câmpul id_utilizator.
Între comenzi și produse există o relație n:n, deoarece o comandă poate conține mai multe produse, dar un produs se poate afla în mai multe comenzi. Această relație este împărțită în 2 relații 1:n și legatura dintre cele două tabele se realizează cu ajutorul tabelei produse_din_comanda care conține cheia primara a fiecarei din cele două tabele.

## Tehnologii folosite
- PHP
- HTML
- CSS
- Bootstrap Studio
- phpMyAdmin
- MariaDB
- XAMPP

## Structura si inter-relationarea tabelelor
#### Diagrama Logică

<p align="center">
  <img src="Baza de date/logical.jpg">
</p>

#### Diagrama Relațională

<p align="center">
  <img src="Baza de date/relational.jpg">
</p>

## Interfața grafică

<p align="center">
  <img src="https://i.ibb.co/4sDy3Gc/Screenshot-5.png">
</p>

<p align="center">
  <img src="https://i.ibb.co/K0xP9K6/Screenshot-7.png">
</p>

## Modul de utilizare

- Se copie fișierul Food_Delivery în C:\xampp\htdocs
- Se creează în phpMyAdmin o baza de date cu numele antighin
- Se importă scriptul database.sql ce produce tabelele corespunzătoare
- Se importă scriptul insert.sql ce introduce în tabele informații
- Aplicatia web se acceseaza din browser prin http://localhost/Food_delivery./
