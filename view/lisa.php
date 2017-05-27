<?php
    require_once('functions.php');

    if (isset($_POST["Register"])) {
        $prompt=testField();
    }
    if (isset($_POST["Login"])) {
        $prompt=testLogin();
    }
?>
<div id="move" class="center mid lisa">
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
            <?php if(isset($prompt)){echo "<p class='noborder' style='color: white; letter-spacing: normal; font-size: 100%;'>".$prompt."</p>";}?>
        </div>
    </form>
</div>
