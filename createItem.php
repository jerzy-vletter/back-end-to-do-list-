<?php

require "connection.php";
require "mainUIPage.php";
require "mainEngine.php";

# checks if the corresponding form on the page uses POST to send data, header in just a redirect.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $listname = $_POST['listName'];
    createList($conn, $listname);

    header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <h1>CREATE YOUR ITEMS</h1>
    </head>
    <body>
        <form method="post">
        
            Name:  <input type="text" name="listName" placeholder="listname"><br />
            <input type="submit" name="submit" value="create item" />
        </form>

    </body>
</html>
<?php 


?>