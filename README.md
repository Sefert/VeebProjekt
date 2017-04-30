/15.04.2016/<br />
MVC variandiga fotogalerii algus.<br />
/30.04.2016/<br />
Andmebaasiga ühendus.Registreerimine ja sessiooni algus("testimata").<br />
Andmebaas sai loodud käsitsi:<br />
USE test;<br />
CREATE TABLE Markmosk_kasutaja (<br />
    Kasutaja_ID INT UNSIGNED auto_increment PRIMARY KEY,<br />
    Eesnimi varchar(50) not null,<br />
    Perenimi varchar(30) not null, <br />
    Parool varchar(16) not null, <br />
    Epost varchar(40) UNIQUE not null,<br />
	Reg_date TIMESTAMP);<br />