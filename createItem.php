<?php

require "connection.php";
require "mainEngine.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $text = $_POST['text'];
    $status = $_POST['status'];
    $listId = $_GET['id'];
    createItem($conn, $name, $text,$status, $listId);

    header("location: index.php");
}


?>

<!DOCTYPE html>
<html>
    <head>
        <h1>CREATE YOUR ITEM</h1>
    </head>
    <body>
        <form method="post">
            Itemname:   <input type="text" name="name" placeholder="Itemname"><br/>
            Text in item:   <input type="text" name="text" placeholder="text"><br/>
            <p>
            status: <select name="status">
                        <option value="">Select...</option>
                        <option value="niet gestart">Niet gestart</option>
                        <option value="in progress">In progress</option>
                        <option value="finished">Finished</option>
                    </select>
            </p>    
            <input type="submit" name="submit" value="create item" />
        </form>

    </body>
</html>
<?php 


?>