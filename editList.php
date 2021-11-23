<?php 

require "connection.php";
require "mainEngine.php";

# getting the id from the url.
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

# edits the items in the list, using the data from the form below
if(isset($_POST['submit'])){
    $EditListName = $_POST['EditListName'];
    editList($conn, $EditListName, $id);

    header("location: index.php");
}

$select = $conn->query("SELECT * FROM list WHERE id=$id");
$row = $select->fetch();
?>

<form action="POST">
    Listname:   <input type="text" name="EditListName" value="<?php echo $row["list"]; ?>"><br/>
</form>