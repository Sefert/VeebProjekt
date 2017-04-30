<?php
    if (isset($_GET["switch"])) {
        if (empty($_GET["surname"]) || empty($_GET["forname"]) || empty($_GET["password"]) || empty($_GET["password2"]) || empty($_GET["mail"])) {
            $prompt = "Kõikide väljade täitmine on kohustuslik!!";
        } else {
            if (preg_match("%@%",$_GET["mail"])) {
                if (strlen($_GET["password"]) <= 5) {
                    $prompt = "Sisestatud paroolid on liiga lühikesed!!";
                } else {
                    if ($_GET["password"] != $_GET["password2"]) {
                        $prompt = "Sisestatud paroolid ei kattu!!";
                    } else {
                        $prompt = "Registreeritud!";
                        require ('session.php');
                    }
                }
            } else {
                $prompt = "E-posti aadress on vigane!!";
            }
        }
    }
?>
<div class="center mid lisa">
    <form class="fpos" action="index.php" method="GET">
        <div>
            <input type="hidden" name="switch" value="lisa">
            <input id="notopbor" type="text" name="surname" placeholder="Perekonnanimi" value='<?php if(!empty($_GET["surname"])){echo $_GET["surname"];}?>'><br>
            <input type="text" name="forname" placeholder="Eesnimi" value='<?php if(!empty($_GET["forname"])){echo $_GET["forname"];}?>'><br>
            <input type="password" name="password" placeholder="Parool vähemalt 6 tähemärki"><br>
            <input type="password" name="password2" placeholder="Korda parooli"><br>
            <input type="email" name="mail" placeholder="Email" value='<?php if(!empty($_GET["mail"])){echo $_GET["mail"];}?>'><br>
            <!--<textarea name="addinfo" placeholder="Lisainfo"></textarea><br>-->
            <button class="button noborder" type="submit">REGISTREERI</button>
            <?php if(isset($prompt)){echo "<p class='noborder' style='color: white'>".$prompt."</p>";}?>
        </div>
    </form>
</div>
