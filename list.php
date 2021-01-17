<?php
    require 'includes/bdd.inc.php';
?> 
<!DOCTYPE html>
<html>
    
    <?php include_once './view/head.html'; ?>

   

    <h1>images enregistrés</h1>
        <?php
           
            $req =$db ->prepare('SELECT * FROM files');
            $req->execute();  
            while ($data = $req->fetch()){
               
           
        ?>

         
            <div class="spaceImg">  

                <img class="img" src="<?php echo $data['file_url'];?>">
            
            </div>

       <?php }?>
</html>  
