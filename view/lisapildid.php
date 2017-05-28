<?php
?>
<div id="move" class="center mid lisa">
    <form class="fpos" action="index.php" method="POST" enctype="multipart/form-data">
        <div>
            <input type="file" name="filetoupload[]" multiple="multiple" <br>
            <div><button class="button noborder" type="submit" name="UpPic" >LISA PILT</button></div>
            <div><button class="button noborder" type="submit" name="DelPic" >KUSTUTA PILT</button></div>
        </div>
    </form>

    <p style='color: white; letter-spacing: normal; font-size: 100%;'>Jagamiseks mõeldud link isikliku galerii kohta:</p>
    <p style='color: white; letter-spacing: normal; font-size: 100%;'><?php echo 'http://enos.itcollege.ee/~mmozniko/index.php?page=galerii&fold='.$_SESSION[$_COOKIE["galerii"]][3]?></p>
</div>
