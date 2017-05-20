Projekt testimiseks : <a style='color blue;' href=http://enos.itcollege.ee/~mmozniko/index.php>http://enos.itcollege.ee/~mmozniko/</a><br />
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
Parandused andmebaasis ja toimiv connection. <br />
/30.04.2016/<br />
Üleminek POST meetodile/Login-registreering süsteem<br />
/07.05.2016/<br />
Pildilehitseja süsteem, sisse logimine<br />
/10.05.2016/<br />
Parandatud pildilehitseja süsteem, SHA1 ja MD5, mitte toimiv kasutaja privaatse kataloogi genereerimine<br />
/13.05.2016/<br />
probleemidega toimiv Login ja session <br />
/14.05.2016/<br />
Toimiv sessioon ja registreering, upload, login, kontrollid , galerii vatsavalt kasutajale<br />
Bug:SIsse logimisel ja registreerimisel ei liiguta logimise lehelt ära, kuid kui ise liikuda, kõik ülejäänu toimib<br />
/20.05.2016/<br />
USE test;<br />
ALTER TABLE Markmosk_kasutaja ADD roll ENUM( 'user', 'admin' ) NOT NULL DEFAULT 'user';<br />
USE test;<br />
UPDATE Markmosk_kasutaja SET roll = 'admin' WHERE Kasutaja_ID = 45;<br />
Lisatud admini rida tabelisse ja käsitsi SQL terminalist. Ainult admin näeb kogu andmebaasi sisu.<br />
Lisatud süsteem ,kus kasutajale antakse unikaalne link tema galerii jagamiseks ja lehele tulijad saavad vaadata just kasutaja poolt jagatud galeriid.<br />
Testimiseks kasutajanimi/parool: admin -> mm@mm.ee/password ,  kasutaja -> nn@nn.ee/password