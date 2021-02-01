<?php

include 'includes/bdd.inc.php'; 
    $id=$_GET['edit'];

    $req = $db->prepare('SELECT * FROM files WHERE id=' . $id);
    $req->execute();
    $donnees = $req->fetch();
    print_r($donnees);
?>
<!DOCTYPE html>
<html>
    
    <?php include_once './view/head.html'; ?>

    <body>

        <div id="buttonListSpace">

            <button>
                
                <a href="list.php">liste des images</a>

            </button>

        </div>
        <h1 class="title">Uploder une image</h1>

        <form method="POST" action="treatment.php" enctype="multipart/form-data" >
            <div id="positionInput">

                <input type="file" name="fichier" /> <br/>

                <input type="hidden"  name="form-edit">

                <input type="submit" value="Envoyer le fichier" />

            </div>
        </form>

       
    </body>
    <!--size verification possible-->
</html>
