<?php 

require "connection.php";
require "mainEngine.php";

# getting the id from the url
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

# the execute portion of what button you have clicked
if(isset($_POST['confirm'])){
    deleteItem($conn, $id);
    header("location: index.php");
}
if(isset($_POST['deny'])){
    header("location: index.php");
}

# getting the data out of the dB using the id that was gotten from the url.
$select = $conn->query("SELECT * FROM list WHERE id=$id");
$row = $select->fetch();

?>

<h1> <?php echo "you are about to delete the ". $row["list"] . " list, do you want to continue?"; ?> </h1>

<form method="post">
    <input type="submit" name="confirm" value="yes"/>
    <input type="submit" name="deny" value="no"/>
</form>


