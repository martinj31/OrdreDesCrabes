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
        <h3>discussion</h3>
        <br>
        <div id="messages">

            

        </div>

        <div id="envoi">



            <form>
                <fieldset>
                    <button onclick="sending()" class="btn btn-primary">Submit</button>
                    <div class="form-group">

                        <label for="exampleTextarea" class="form-label mt-4">Message</label>
                        <textarea class="form-control" id="messageSend" rows="3" maxlength="500"></textarea>

                    </div>

                </fieldset>


            </form>
        </div>

    </div>
</body>

</html>



<script>
    //Utilisation de l'Ajax pour rendre l'avancé de la commande dynamique
    function showHint() {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("messages").innerHTML = this.responseText;

            }
        };
        xmlhttp.open("POST", "messageDynamique.php", true);
        xmlhttp.send();


        //rappel la fonction toute les seconds    
        setTimeout(showHint, 5000);


    }

    showHint();



    function sending() {
        var message = document.getElementById("messageSend").value;
        var respo = document.getElementById("respo");

        const xhttp = new XMLHttpRequest();
        xhttp.onload = function() {
            //document.getElementById("txtHint").innerHTML = this.responseText;
        }
        xhttp.open("GET", "../CONTROLLEUR/messageControlleur.php?message=" + message);
        xhttp.send();




    }
</script>