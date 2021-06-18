<?php
session_start();
require_once "functions.php";
$_user_id = $_SESSION['id']??0;
if(!$_user_id){
    header('Location: index.php');
    die();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="voc">

    <div class="sidebar">
        <h4>Menu</h4>
        <ul>
            <li><a href="words.php" class="menu-item" data-target="words">All Words</a></li>
            
            <li><a href="#" class="menu-item" data-target="wordform" >Add New Word </a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    
    </div>
        <h1 class="maintitle">
            <i class="fas fa-language"></i></br> My Vocabularies
        </h1>



    <div class="formc helement" id="wordform" style="display: none;" >
            <form action="tasks.php" method="post" >
                <h4>Add New Word</h4>
                <fieldset>
                    <label for="word">Word</label>
                    <input type="text" name="word" placeholder="word" id="word">
                    <label for="Meaning">Meaning</label>
                    <textarea name="meaning" id="Meaning" placeholder="Meaning" style="height: 100px;" rows="10"></textarea>
                    <input type="hidden" name="action" value="addword">
                    <input type="submit" class="button button-primary" value="Add word">
                </fieldset>
            </form>
    </div>
    <div class="container" id="main">

        <div class="wordsc helement" id="words">
            <div class="row">
                <div class="column column-50">
                    <div class="alphabates">
                        <select  id="alphabets">
                        <option value="all">All Words</option>
                        <option value="A">A#</option>
                        <option value="B">B#</option>
                        <option value="C">C#</option>
                        <option value="D">D#</option>
                        <option value="N">N#</option>
                        <option value="M">M#</option>
                        <option value="J">J#</option>
                        </select>
                    </div>
                </div>
                <div class="column column-50">
                    <form action="" method="POST">
                        <button class="float-right" name="submit" value="submit">Search</button>
                        <input type="text" name="search" class="float-right" style="width: 50%; margin-right: 20px;" placeholder="Search">
                    </form>
                </div>
       
         <hr>
            <table class="words">
                <thead>
                    <tr>
                        <th width="35%">Word</th>
                        <th >Definition</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(isset($_POST['submit'])){
                            $searchedText = $_POST['search'];
                            $words = getWords($_user_id,$searchedText);
                        }else {
                            $words = getWords($_user_id,);
                        }
                        if(count($words)>0){
                            $length = count($words);
                            for ($i=0; $i < $length; $i++) {
                                ?> 
                                <tr>
                                    <td> <?php echo $words[$i] ['word']; ?> </td>
                                    <td><?php echo $words[$i] ['meaning']; ?></td>   
                                </tr>
                                <?php 
                            }
                        }
                    ?>
                <tbody>
            </table>
        </div>


</div>
</body>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/script.js?1"></script>
</html>