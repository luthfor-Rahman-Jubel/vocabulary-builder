<?php
session_start();
$_user_id = $_SESSION['id'] ?? 0;
if($_user_id){
    header('Location: words.php');
    die();
}
 include_once "functions.php";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="formaction">
            <h3> <a href="#" id="login"> Login </a> | <a id="register" href="#">RegisterAcount</a> </h3>
        </div>


        <div class="formc">
            <form id="form01" action="tasks.php" method="post">
                <h3>Login</h3>
                <fieldset>
                    <label for="email">Email : </label></br>
                    <input type="email" name="email" placeholder="Email Address" id="email"></br>
                    <label for="password">Password : </label> </br>
                    <input type="password" name="password" placeholder="password" id="password"></br></br>
                    <?php 
                    
                    $error = $_GET['error']?? 0;
                    if($error){
                        echo getErrorMessage($error);
                    }
                    
                    ?>
                  </br>  <input class="btn btn-primary" type="submit" value="Submit"> </br>

                    <input type="hidden" id="action" name="action" value="login" >
                </fieldset>
            </form>
        </div>
    </div>
</body>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js"></script>
</html>