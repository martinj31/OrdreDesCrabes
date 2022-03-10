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

    <div id="container">
        <form action="../CONTROLLEUR/LOLControlleur.php" method="post" enctype="multipart/form-data">

            <div class="form-group">
                <label class="col-form-label mt-4" for="inputDefault">Titre Video</label>
                <input name="titre" type="text" class="form-control" placeholder="Titre" id="inputDefault" required>
            </div><br>
            <input type="file" name="my_video">

            <input type="submit" name="submit" value="Upload">
        </form>
        <br>
        <?php



        require('../MODEL/BDD/note.bdd.php');
        require('../MODEL/BDD/video.bdd.php');
        require('../MODEL/BDD/connexion.bdd.php');
        require('../MODEL/BDD/user.bdd.php');


        $db = new BDD(); // Utilisation d'une classe pour la connexion à la BDD
        $bdd = $db->connect();

        $videoBDD = new videoBDD($bdd);
        $userBDD = new userBDD($bdd);
        $noteBDD = new noteBDD($bdd);

        $videoS = $videoBDD->SelectAllVideo();


        foreach ($videoS as $value) {

            

            echo ('<a href="LOLVideo.php?idVideo=' . $value->getIdVideo() . '" ><div class="videoContainer"><h5>' . $value->getTitre() . '</h5>
            <br><br><video width="224" height="150" src="../VIDEO/' . $value->getVideoName() . '" controls>

    </video>
    <h5>' . $userBDD->SelectUserByID($value->getAuteur())->getPseudo() . '</h5>
    </div></a>');
        }


        ?>


    </div>


</body>

</html>