<div class="header">
    <ul>
        <div class="div"></div>
        <div class="headerdiv"><li><a href="?page=galerii">GALERII</a></li></div>
        <?php if (!isset($_COOKIE["galerii"])):?>
            <div class="div"></div>
            <div class="headerdiv"><li><a href="?page=lisa">LOGIN</a></li></div> <!--href="?page=lisa" -->
        <?php endif; ?>
        <div class="div"></div>
        <div class="headerdiv"><li><a href="?page=loend">LOEND</a></li></div>
        <?php if (isset($_COOKIE["galerii"])):?>
            <div id="namelocation" class="div"></div>
            <div id="namelocation"><li><a style="color: white" href="?page=kasutaja"><?php echo $_SESSION[$session_id][0]." ".$_SESSION[$session_id][1]?></a></li></div>
        <?php endif; ?>
    </ul>
</div>