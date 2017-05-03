<?php
    if (isset($_POST["Register"])) {
        if (empty($_POST["surname"]) || empty($_POST["forname"]) || empty($_POST["password"]) || empty($_POST["password2"]) || empty($_POST["mail"])) {
            $prompt = "Kõikide väljade täitmine on kohustuslik!!";
        } else {
            if (preg_match("%@%",$_POST["mail"])) {
                if (strlen($_POST["password"]) <= 5) {
                    $prompt = "Sisestatud paroolid on liiga lühikesed!!";
                } else {
                    if ($_POST["password"] != $_POST["password2"]) {
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
    if (isset($_POST["Login"])) {
      require_once ("db/Database.php");
      $login= new Database();
      $login->_setIdentify($_POST['mail'],$_POST['password']);
      $data=$login->_getIdentify();
      print_r($data);
      var_dump($data);
    }
?>
<div class="center mid lisa">
    <form class="fpos" action="index.php" method="POST">
        <div>
            <input type="hidden" name="switch" value="lisa">
            <input id="notopbor" type="email" name="mail" placeholder="Email" value='<?php if(!empty($_POST["mail"])){echo $_POST["mail"];}?>'><br>
            <input type="password" name="password" placeholder="Parool vähemalt 6 tähemärki"><br>
            <span <?php if (!isset($_POST["Register"])) echo 'class="hide"' ?>>
                <input type="password" name="password2" placeholder="Korda parooli"><br>
                <input type="text" name="surname" placeholder="Perekonnanimi" value='<?php if(!empty($_POST["surname"])){echo $_POST["surname"];}?>'><br>
                <input type="text" name="forname" placeholder="Eesnimi" value='<?php if(!empty($_POST["forname"])){echo $_POST["forname"];}?>'><br>
                <button class="button noborder" type="submit" name="Register">REGISTREERI</button>
            <!--<textarea name="addinfo" placeholder="Lisainfo"></textarea><br>-->
            </span id="login">
                <div><button class="button noborder" type="submit" name="Login">SISENE</button></div>
            <span <?php if (isset($_POST["Register"])) echo 'class="hide"' ?> >
                <button id="slide" class="button noborder" type="button">REGISTREERI</button>
            </span>
            <?php if(isset($prompt)){echo "<p class='noborder' style='color: white'>".$prompt."</p>";}?>
        </div>
    </form>
</div>
