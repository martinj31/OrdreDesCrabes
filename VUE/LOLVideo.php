<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
<link rel="stylesheet" href="../CSS/index.css">

<head>
    <title>Ordre Des Crabes</title>
</head>

<body>
    <?php

    require_once('TEMPLATE/Header.php');
    ?>
    <br>


    <?php



require('../MODEL/BDD/note.bdd.php');
require('../MODEL/BDD/video.bdd.php');
require('../MODEL/BDD/connexion.bdd.php');
require('../MODEL/BDD/user.bdd.php');


$db = new BDD(); // Utilisation d'une classe pour la connexion à la BDD
$bdd = $db->connect();

$videoBDD = new videoBDD($bdd);
$noteBDD = new noteBDD($bdd);
$userBDD = new userBDD($bdd);

if(isset($_GET['idVideo'])){


    $idvideo = htmlspecialchars($_GET['idVideo']);
    $video = $videoBDD->SelectVideoByID($idvideo);



    echo ('<h5>' . $video->getTitre() . '</h5>
            <br><br><video  src="../VIDEO/' . $video->getVideoName() . '" controls>

    </video>
    <h5>' . $userBDD->SelectUserByID($video->getAuteur())->getPseudo() . '</h5>
    ');


    echo('<form action="../CONTROLLEUR/LOLControlleur.php" method="post">
<fieldset>
<div class="form-group">
      <label for="exampleSelect1" class="form-label mt-4">Note</label>
      <select name="note" class="form-select" id="exampleSelect1">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
      </select>
    </div>
</fieldset>

<input name="idVideo" value="' . $video->getIdVideo() . '" Hidden>
<input name="auteur" value="' . $video->getAuteur() . '" Hidden>
<button type="submit" class="btn btn-primary">Submit</button><br><br>');


            $noteVideo = $noteBDD->SelectNoteByVideo($video->getIdVideo());

            $nombreNote = 0;
                $noteAjout = 0;
            if (!empty($noteVideo)) {

                $nombreNote = 0;
                $noteAjout = 0;

                foreach ($noteVideo as $value) {

                    $nombreNote++;
                    $noteAjout = $noteAjout + $value->getNote();
                }

                $noteFinal = $noteAjout / $nombreNote;

                echo ($noteFinal.'/5  ('.$nombreNote.')');

            } else {

                echo ('0/5  (0)');
            }

            


            echo('</form><br>');

}






        


        ?>