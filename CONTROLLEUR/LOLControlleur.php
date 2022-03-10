<?php

require('../MODEL/BDD/user.bdd.php');
require('../MODEL/BDD/note.bdd.php');
require('../MODEL/BDD/video.bdd.php');
require('../MODEL/BDD/connexion.bdd.php');
session_start();

$db = new BDD(); // Utilisation d'une classe pour la connexion à la BDD
$bdd = $db->connect();

$videoBDD = new videoBDD($bdd);
$Video = new Video([]);
$noteBDD = new noteBDD($bdd);


if (isset($_POST['submit']) && isset($_FILES['my_video']) && isset($_POST['titre'])) {
    //include "db_conn.php";
    $video_name = $_FILES['my_video']['name'];
    $tmp_name = $_FILES['my_video']['tmp_name'];
    $error = $_FILES['my_video']['error'];



    if ($error === 0) {
        $video_ex = pathinfo($video_name, PATHINFO_EXTENSION);

        $video_ex_lc = strtolower($video_ex);

        $allowed_exs = array("mp4", 'webm', 'avi', 'flv');

        if (in_array($video_ex_lc, $allowed_exs)) {

            $new_video_name = uniqid("video-", true) . '.' . $video_ex_lc;
            $video_upload_path = '../VIDEO/' . $new_video_name;
            move_uploaded_file($tmp_name, $video_upload_path);


            $Video->setAuteur($_SESSION['idUser']);
            $Video->setTitre($_POST['titre']);
            $Video->setVideoName($new_video_name);

            $videoBDD->addVideo($Video);

        } else {
            $em = "You can't upload files of this type";
            header("Location: ../VUE/LOL.php?error=$em");
        }
    }
    header("Location: ../VUE/LOL.php");
} 



if(isset($_POST['note'])){


    $UserBDD = new UserBDD($bdd);

    $User = $UserBDD->SelectUserByID($_POST['auteur']);

   $User->setScore( $User->getScore() + $_POST['note']);

    $Note = new Note([]);
    $Note->setIdUser($_SESSION['idUser']);
    $Note->setIdVideo($_POST['idVideo']);
    $Note->setNote($_POST['note']);

    $personneNote = $noteBDD->SelectNoteByVideo($_POST['idVideo']);

    $test = false;

    foreach( $personneNote as $value){

        if($value->getIdUser() == $_SESSION['idUser']){
            $test = true;
        }

    }

    if($test == true){
        $noteBDD->updateNote($Note, $_POST['idVideo']);
    }else{
        $noteBDD->addNote($Note);
        $User->setScore( $User->getScore() + $_POST['note']);
        $UserBDD->updateUser($User);
        

    }

    $idvideo = $_POST['idVideo'];
    header("Location: ../VUE/LOLVideo.php?idVideo='.$idvideo.'");

}



