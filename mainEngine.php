
<?php

#this is the "brain" behind the project, all the function runs will be executed from here


#inserting data from the add item form into the database
function createList($conn, $listname){

    #insert using data created and made into variables on the createList.php page.
    $pdoQuery = "INSERT INTO list(name) VALUES (:listname)"; 
    $pdoQuery_run = $conn->prepare($pdoQuery);
    $pdoQuery_run->bindParam(':listname', $listname);
    $pdoQuery_run->execute();
}

function createItem($conn, $name, $text, $listId){
    #insert using data created and made into ariables on the createItem.php page.
    $pdoQuery = "INSERT INTO subjects(name, text, listId) VALUES (:name, :text,  :listId)"; 
    $pdoQuery_run = $conn->prepare($pdoQuery);
    $pdoQuery_run->bindParam('name', $name);
    $pdoQuery_run->bindParam('text', $text);
    $pdoQuery_run->bindParam('listId', $listId);
    $pdoQuery_run->execute();
}

# using the data that was inserted into the form on the editItem.php page to edit the dB entry with the matching id.
function editItem($conn, $EditTaakName, $EditListName, $id){

    $pdoQuery = "UPDATE list SET name = '".$EditTaakName."', list = '".$EditListName."' WHERE id=$id";
    $stmt = $conn->prepare($pdoQuery);
    $stmt->execute();
};

# deleting the dB entry with a matching id that was selected.
function deleteItem($conn, $id){
    $query = "DELETE FROM list WHERE id=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}

?>