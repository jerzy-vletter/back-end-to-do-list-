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
    $EditTaakName = $_POST['EditTaakName'];
    editItem($conn, $EditTaakName, $EditListName, $id);

    header("location: index.php");
}
?>