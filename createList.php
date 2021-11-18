<?php

require "connection.php";
require "mainEngine.php";

# checks if the corresponding form on the page uses POST to send data, header in just a redirect.
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $listname = $_POST['listname'];
    createList($conn, $listname);

    header("location: index.php");
}

?>

<!DOCTYPE html>
<html>
    <head>
        <h1>CREATE YOUR LIST</h1>
    </head>
    <body>
        <form method="post">
            Listname:   <input type="text" name="listname" placeholder="listname"><br/>
            <input type="submit" name="submit" value="create list" />
        </form>

    </body>
</html>
<?php 


?>