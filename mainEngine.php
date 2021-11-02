
<?php

#this is the "brain" behind the project, all the function runs will be executed from here


#inserting data from the add item form into the database


function createList($conn, $listname){

    #insert using data created and made into variables on the createItem.php page.
        $pdoQuery = "INSERT INTO list(name) VALUES (:listName)"; 
        $pdoQuery_run = $conn->prepare($pdoQuery);
        $pdoQuery_run->bindParam(':listName', $listname);
        $pdoQuery_run->execute();

}
?>