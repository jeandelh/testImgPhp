<?php
    require 'includes/bdd.inc.php';
    $extensions_autorisees=array('.png','.jpg','.gif','.igo','jpeg');

    if(!empty($_FILES)){
   
       $file_name= $_FILES['fichier']['name'];
    
   
       $file_tmp_name= $_FILES['fichier']['tmp_name'];
       $file_dest='files/'.$file_name;
       $file_extension =strrchr($file_name, ".");
   
     
   
       if(in_array($file_extension, $extensions_autorisees)){
         
             $req="INSERT INTO files (file_url) VALUES ('$file_dest')";
   
             if($db->query($req)== TRUE)
             {
   
                 echo "fichier enregistré";
   
             }
   
             else
             {
   
                 echo "erreur";
   
             }
             
     
        
            move_uploaded_file($_FILES['fichier']['tmp_name'],'files/'.$file_name);
       }
       else
       {
         echo 'erreur';
       }
   }
   else
   {
     echo 'erreur champs pas remplis';
   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Upload d'image</title>
        <meta charset="UTF-8" />
    </head>
    <body>
        <h1>Uploder une image</h1>

        <form method="POST" enctype="multipart/form-data">

            <input type="file" name="fichier" /> <br/>
            <input type="submit" value="Envoyer le fichier" />

        </form>
        <h1>images enregistrés</h1>
        <?php
            $req = $db->query('SELECT name, file_url FROM files');
            $req =$db ->prepare('SELECT * FROM files');
            $req->execute();
            $data = $req->fetch();
                /*echo $data['name'] . ':' <a href"'.$data['file_url'].'">telecharger '.$data['name']'</a>';*/
           
        ?>
         <img src="<?php echo $data['file_url'];?>"><!--marche balise img-->
     
            
    </body>
    <!--size verification possible-->
</html>

 

