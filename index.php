<?php
    require 'includes/bdd.inc.php';
?>    
<!DOCTYPE html>
<html>
    
    <?php include_once './view/head.html'; ?>

    <body>
    
        <h1>Uploder une image</h1>

        <form method="POST" action="treatement.php" enctype="multipart/form-data" >

            <input type="file" name="fichier" /> <br/>

            <input type="hidden"  name="form-add">
            <input type="submit" value="Envoyer le fichier" />
            
        </form>

    </body>
    <!--size verification possible-->
</html>

 

