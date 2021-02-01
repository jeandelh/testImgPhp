<?php
    require 'includes/bdd.inc.php';
    $extensions_autorisees=array('.png','.jpg','.gif','.igo','jpeg');
    if(isset($_POST["form-add"]))
    {       
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
    }
    elseif(isset($_GET["del"]))
    {
        $query=$db->prepare('DELETE FROM files WHERE id= ?');
        $query->execute(array($_GET['del']));
        $query->closeCursor();

    }
    elseif(isset($_POST["form-edit"]))
    {
        if(!empty($_FILES)){
            $file_name= $_FILES['fichier']['name'];
            
        
            $file_tmp_name= $_FILES['fichier']['tmp_name'];
            $file_dest='files/'.$file_name;
            $file_extension =strrchr($file_name, ".");
            if(in_array($file_extension, $extensions_autorisees))
            {
                //$req="INSERT INTO files (file_url) VALUES ('$file_dest')"; à modifier
                $req = $db->prepare("UPDATE files set file_url='$file_dest'");
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
            echo 'erreur';
        }
    }
   header("Location: list.php");