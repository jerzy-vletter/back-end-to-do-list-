
<?php

#this is the "brain" behind the project, all the function runs will be executed from here


#inserting data from the add item form into the database
if(isset($_POST['submit'])){
    $listname = $_POST['listName']; 

    $pdoQuery = "INSERT INTO name('name') VALUES (:listname)";
    $pdoQuery_run = $conn->prepare($pdoQuery);
    $pdoQuery_exec = $pdoQuery_run->execute(array(':name'=>$listname));
}

?>