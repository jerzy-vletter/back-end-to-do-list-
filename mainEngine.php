
<?php

require "connection.php";

#this is the "brain" behind the project, all the function runs will be executed from here

# == all the crud stuff for the list part of the project. ==

#inserting data from the add item form into the database
function createList($listname){

    #insert using data created and made into variables on the createList.php page.
    $conn = createConnection();
    $pdoQuery = "INSERT INTO list(name) VALUES (:listname)"; 
    $pdoQuery_run = $conn->prepare($pdoQuery);
    $pdoQuery_run->bindParam(':listname', $listname);
    $pdoQuery_run->execute();
}

#using the data that was inserted into the form on the editList.php page to edit ihe dB entry with the matching id in the list table
function editList($EditListName, $id){
    $conn = createConnection();
    $pdoQuery = "UPDATE list SET name = ' list = '".$EditListName."' WHERE id=$id";
    $stmt = $conn->prepare($pdoQuery);
    $stmt->execute();
}


# == end of the crud for list part of the project == 

# == all of the crud stuff for the item part of the project. == 

function createItem($name, $text, $status, $duur, $duur2, $listId){
    #insert using data created and made into variables on the createItem.php page.
    $conn = createConnection();
    $pdoQuery = "INSERT INTO subjects(name, text, tags, tijd, tijd2, listId) VALUES (:name, :text, :status, :duur, :duur2, :listId)"; 
    $pdoQuery_run = $conn->prepare($pdoQuery);
    $pdoQuery_run->bindParam('name', $name);
    $pdoQuery_run->bindParam('text', $text);
    $pdoQuery_run->bindParam('status', $status);
    $pdoQuery_run->bindParam('duur', $duur);
    $pdoQuery_run->bindParam('duur2', $duur2);
    $pdoQuery_run->bindParam('listId', $listId);
    $pdoQuery_run->execute();
}

# using the data that was inserted into the form on the editItem.php page to edit the dB entry with the matching id.
function editItem($conn, $name, $text, $status, $duur, $duur2, $id){
    $conn = createConnection();
    $pdoQuery = "UPDATE subjects SET `name`=:name, `text`=:text, `tags`=:status, `tijd`=:duur, `tijd2`=:duur2 WHERE id =:id";
    $stmt = $conn->prepare($pdoQuery);
    $stmt -> bindParam('name', $name);
    $stmt -> bindParam('text', $text);
    $stmt -> bindParam('status', $status);
    $stmt -> bindParam('duur', $duur);
    $stmt -> bindParam('duur2', $duur2);
    $stmt -> bindParam('id', $id);
    $stmt->execute();
    
};

# deleting the dB entry with a matching id that was selected.
function deleteList($conn, $id){
    $conn = createConnection();
    $query = "DELETE FROM list WHERE id=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();
}

function deleteItem($conn, $id){
    
    $query = "DELETE FROM subjects WHERE id=$id";
    $stmt = $conn->prepare($query);
    $stmt->execute();

}

# == end of the crud stuff for the item part of the project. ==

# == begin van 
function fetchLists(){
    $conn = createConnection();
    $sql = 'SELECT * FROM list';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function fetchTasksFromList($listId){
    
    $conn = createConnection();
    $sql = 'SELECT * FROM subjects WHERE listId= :listId';
    $stmt = $conn->prepare($sql);
    $stmt -> bindParam('listId', $listId);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function sortDuur($listId){

    $conn = createConnection();
    $sql = 'SELECT * FROM subjects WHERE listId= :listId ORDER BY tijd';
    $stmt = $conn->prepare($sql);
    $stmt -> bindParam('listId', $listId);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function filterSubjects($filterMod, $listId){
    $conn = createConnection();
    $sql = "SELECT * FROM subjects WHERE tags= :filter AND listId= :listId";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('filter', $filterMod);
    $stmt -> bindParam('listId', $listId);
    $stmt->execute();
    $result = $stmt->fetchall();
    return $result;
}


?>