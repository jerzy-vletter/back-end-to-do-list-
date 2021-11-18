<?php 

require "connection.php";
require "mainEngine.php";

# getting the id from the url.
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

# inserting the data given in the form on this page into variables so it can be used on the mainEngine.php page.
if(isset($_POST['submit'])){
    $EditListName = $_POST['EditListName'];
    $EditTaakName = $_POST['EditTaakName'];
    editItem($conn, $EditTaakName, $EditListName, $id);

    header("location: index.php");
}

# selecting all data from the list table using the id gotten from the url to use it in the form.
$select = $conn->query("SELECT * FROM list WHERE id=$id");
$row = $select->fetch();

?>

<form method="POST">
    Taakname:   <input type="text" name="EditTaakName" value="<?php echo $row["name"]; ?>"><br/>
    Listname:   <input type="text" name="EditListName" value="<?php echo $row["list"]; ?>"><br/>
    <input type="submit" name="submit" value="update">
</form>