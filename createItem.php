<?php

require "connection.php";
require "mainUIPage.php";
require "mainEngine.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $text = $_POST['text'];
    $listId = $_POST['listId'];
    createItem($conn, $name, $text, $listId);

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
            What list does it belong to:   <input type="text" name="listId" placeholder="listname"><br/>
            <input type="submit" name="submit" value="create item" />
        </form>

    </body>
</html>
<?php 


?>