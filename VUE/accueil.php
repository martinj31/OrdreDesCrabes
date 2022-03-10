<!DOCTYPE html>
<html>
<link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css" >
<link rel="stylesheet" href="../CSS/index.css" >

<head>
    <title>Ordre Des Crabes</title>
</head>

<body>

    <?php
    //Importation du header
 

    ?>
    <br> <br>
    <h1>ORDRE DES CRABES</h1>
<br> <br>
    <br> <br> <br> <br> <br> <br>
    <div id="container">
        <form action="../CONTROLLEUR/loginControlleur.php" method="POST">
            <div class="form-group">


                <div class="form-floating mb-3">
                    <input name="pseudo" type="text" class="form-control" id="floatingInput" placeholder="pseudo" required>
                    <label for="floatingInput">Pseudo </label>
                </div><br>
                <div class="form-floating">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password" required>
                    <label for="floatingPassword">Mot de passe</label>
                </div>
            </div>
            <br><br><br>
            <button name="sub" type="submit" class="btn btn-primary">Connexion</button>
            </fieldset>
        </form>
        <br><br>

        <form action="inscription.php">

            <button type="submit" class="btn btn-primary">Inscription</button>
            </fieldset>
        </form>
    </div>
</body>

</html>