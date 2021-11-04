<?php 

require "connection.php";
require "mainUIPage.php";
require "mainEngine.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

if(isset($_POST['submit'])){
    $EditListName = $_POST['EditListName'];
    $EditTaakName = $_POST['EditTaakName'];
    editItem($conn, $EditTaakName, $EditListName, $id);

    header("location: index.php");
}

$select = $conn->query("SELECT * FROM list WHERE id=$id");
$row = $select->fetch();

?>

<form method="POST">
    Taakname:   <input type="text" name="EditTaakName" value="<?php echo $row["name"]; ?>"><br/>
    Listname:   <input type="text" name="EditListName" value="<?php echo $row["list"]; ?>"><br/>
    <input type="submit" name="submit" value="update">
</form>