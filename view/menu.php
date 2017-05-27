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
                <div class="headerdiv"><a href="?page=loend">LOGI</a></div>
             <?php endif;?>
        <?php endif;?>
        <?php if (isset($_COOKIE["galerii"])):?>
            <form action="logiloend.php" method="post">
                <button class="headerdiv button noborder" type="submit" name="logout">LOGOUT</button>
            </form>
            <div id="namelocation" class="div"></div>
            <div id="namelocation"><a style="color: white" href="?page=kasutaja"><?php echo $_SESSION[$session_id][0]." ".$_SESSION[$session_id][1]?></a></div>
        <?php endif; ?>
</div>