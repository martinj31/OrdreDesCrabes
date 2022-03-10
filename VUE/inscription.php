<link rel="stylesheet" href="https://bootswatch.com/5/darkly/bootstrap.min.css">
<link rel="stylesheet" href="../CSS/index.css">

<head>
    <title>Ordre Des Crabes</title>
</head>

<br> <br>
<h1>ORDRE DES CRABES</h1>
<br> <br>
<div id="container">

    <form action="../CONTROLLEUR/inscriptionControlleur.php" method="post">

        <fieldset>
            <legend>Inscription</legend>


            <div class="form-group">
                <label class="col-form-label mt-4" for="inputDefault">Pseudo</label>
                <input name="pseudo" type="text" class="form-control" placeholder="Pseudo" id="inputDefault" required>
            </div>


            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">Password</label>
                <input name="password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" class="form-label mt-4">Confirm Password</label>
                <input name="password_comfirm" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>



            <br>
            <button name="sub" value="OK" type="submit" class="btn btn-primary">Submit</button>
        </fieldset>
    </form>

    <form action="accueil.php" method="post">
        <button name="sub" value="OK" type="submit" class="btn btn-primary">Retour</button>
    </form>

</div>