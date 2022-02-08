<?php 

require "mainEngine.php";

# getting the id from the url.
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

# edits the items in the list, using the data from the form below
if(isset($_POST['submit'])){ 
    $editListName = $_POST['editListName'];
    editList($editListName, $id);
    header("location: index.php");
}

$data = getDataFromList($id);
?>

<form method="POST">
    Listname:   <input type="text" name="editListName" value="<?php echo $data[1]; ?>"><br/>
    <input type="submit" name="submit" value="update">
</form>
