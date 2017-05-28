<div class="header">
        <div class="div"></div>
        <div class="headerdiv"><a href="?page=galerii">GALERII</a></div>
        <?php if (!isset($_COOKIE["galerii"])):?>
            <div class="div"></div>
            <div class="headerdiv"><a href="?page=lisa">LOGIN</a></div> <!--href="?page=lisa" -->
        <?php endif; ?>
        <?php if (isset($_COOKIE["galerii"])):?>
            <?php if ($_SESSION[$session_id][4]=='admin'):?>
                <div class="div"></div>
                <div class="headerdiv"><a href="?page=loend">LOEND</a></div>
                <div class="div"></div>
                <div class="headerdiv"><a href="?page=logi">LOGI</a></div>
             <?php endif;?>
        <?php endif;?>
        <?php if (isset($_COOKIE["galerii"])):?>
            <form style="display: none;" action="index.php" method="post" id="form2"></form>
            <button class="headerdiv button noborder" style="margin-left:-5px;width: 150px;height: 50px" form="form2" type="submit" name="Logout">LOGOUT</button>
            <div id="namelocation" class="div"></div>
            <div id="namelocation" ><a style="color: white" href="?page=kasutaja"><?php echo $_SESSION[$session_id][0]." ".$_SESSION[$session_id][1]?>    <strong id="time"></strong></a></div>
        <?php endif; ?>
</div>