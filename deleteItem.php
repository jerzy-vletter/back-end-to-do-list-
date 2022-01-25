<?php 

require "mainEngine.php";

# getting the id from the url
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}

# the execute portion of what button you have clicked
if(isset($_POST['confirm'])){
    deleteItem($id);
    header("location: index.php");
}
if(isset($_POST['deny'])){
    header("location: index.php");
}

# getting the data out of the dB using the id that was gotten from the url.
$data = getDataFromSubject($id);

?>

<h1> <?php echo "you are about to delete the ". $data[1] . " item, do you want to continue?"; ?> </h1>

<form method="post">
    <input type="submit" name="confirm" value="yes"/>
    <input type="submit" name="deny" value="no"/>
</form>



