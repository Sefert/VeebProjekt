Projekt testimiseks : <a style='color blue;' href=http://enos.itcollege.ee/~mmozniko/>http://enos.itcollege.ee/~mmozniko/</a><br />
/15.04.2016/<br />
MVC variandiga fotogalerii algus.<br />
/30.04.2016/<br />
Andmebaasiga ühendus.Registreerimine ja sessiooni algus("testimata").<br />
Andmebaas sai loodud käsitsi:<br />
USE test;<br />
CREATE TABLE Markmosk_kasutaja (<br />
&nbsp;&nbsp;&nbsp;Kasutaja_ID INT UNSIGNED auto_increment PRIMARY KEY,<br />
&nbsp;&nbsp;&nbsp;Eesnimi varchar(50) not null,<br />
&nbsp;&nbsp;&nbsp;Perenimi varchar(30) not null, <br />
&nbsp;&nbsp;&nbsp;Parool varchar(16) not null, <br />
&nbsp;&nbsp;&nbsp;Epost varchar(40) UNIQUE not null,<br />
&nbsp;&nbsp;&nbsp;Reg_date TIMESTAMP);<br />
Parandused andmebaasis ja toimiv connection. 