<?php
include_once("views/layout/header.php");
?>   
    <main>
    <?php
    if(isset($_GET['action'])){
        include_once("views/{$_GET['action']}.php");
    }
    else{
        include_once("views/start.php");
    }
    ?>
    </main>
<?php
include_once("views/layout/footer.php");
?>  