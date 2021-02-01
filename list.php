<?php
    require 'includes/bdd.inc.php';
?> 
<!DOCTYPE html>
<html>
    
    <?php include_once './view/head.html'; ?>

   

        <h1 class="title">images enregistrés</h1>
        <?php
           
            $req =$db ->prepare('SELECT * FROM files');
            $req->execute();  
            while ($data = $req->fetch()){
               
           
        ?>

         
            <div id="positionImg">  

                <img id="img" src="<?php echo $data['file_url'];?>">
                
                
                <div id="positionButton">

                    <div id="spaceButton">

                        <button class="button" type="button">
                           
                            <a href="form-edit.php?edit=<?php echo $data['id']?>">

                                <p>modifier</p>

                            </a>

                        </button>

                    </div>

                    <button class="button" type="button">
                    
                        <a href="treatment.php?del=<?php echo $data['id']?>">

                            <p>supprimer</p>

                        </a>
                        
                    </button>

                </div>

            </div>
            
       <?php }?>
</html>  
