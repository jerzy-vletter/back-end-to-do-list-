<?php 

require "connection.php";
require "mainEngine.php";

# getting the id from the url.
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

# inserting the data given in the form on this page into variables so it can be used on the mainEngine.php page.
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $text = $_POST['text'];
    $status = $_POST['status'];
    editItem($conn, $name, $text, $status ,$id);

    header("location: index.php");
}

# selecting all data from the list table using the id gotten from the url to use it in the form.
$select = $conn->query("SELECT * FROM subjects WHERE id=$id");
$row = $select->fetch();

?>

<form method="POST">
    name:   <input type="text" name="name" value="<?php echo $row["name"]; ?>"><br/>
    text:   <input type="text" name="text" value="<?php echo $row['text']; ?>"><br/>
    <p> status van taak    <?php # doesn't work ?>
        <select name="status">
            <option value="">Select...</option>
            <option value="niet gestart">niet gestart</option>
            <option value="in progress">in progress</option>
            <option value="done">done</option>
        </select>
    </p>
    <input type="submit" name="submit" value="update">
</form>