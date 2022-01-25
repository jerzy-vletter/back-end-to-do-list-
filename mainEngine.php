
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
function editList($editListName, $id){
    $conn = createConnection();
    $sql = "UPDATE list SET name = :editListName WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':editListName', $editListName);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
}

# deleting the dB entry with a matching id that was selected.
function deleteList($id){
    $conn = createConnection();
    $sql = "DELETE FROM list WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt -> bindParam('id', $id);
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
function editItem($name, $text, $status, $duur, $duur2, $id){
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

# using the data that matches the id of the item in the db, it will delete that item if the condition for execution is met (check funtion in the index page to see and edit that condition)
function deleteItem($id){
    $conn = createConnection();
    $sql = "DELETE FROM subjects WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt -> bindParam('id', $id);
    $stmt->execute();

}

# == end of the crud stuff for the item part of the project. ==

# == begin of other function executions, keeping this seperate for readability ==

# fetching all data from database table list so it can be displayed on main page
function fetchLists(){

    $conn = createConnection();
    $sql = 'SELECT * FROM list';
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

# fetching all data from database table subjects so it can be displayed on the main page in it's matching list
function fetchTasksFromList($listId){
    
    $conn = createConnection();
    $sql = 'SELECT * FROM subjects WHERE listId= :listId';
    $stmt = $conn->prepare($sql);
    $stmt -> bindParam('listId', $listId);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

# double checks all fetched data on a given modifier so sorts them from lowest to highest
function sortDuur($listId){

    $conn = createConnection();
    $sql = 'SELECT * FROM subjects WHERE listId= :listId ORDER BY tijd';
    $stmt = $conn->prepare($sql);
    $stmt -> bindParam('listId', $listId);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

# filters all data using a given modifier that is desided on the index page.
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

# function used for crud.
function getDataFromSubject($id){
    $conn = createConnection();
    $sql = "SELECT * FROM subjects WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}

# function used for crud.
function getDataFromList($id){
    $conn = createConnection();
    $sql = "SELECT * FROM list WHERE id= :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam('id', $id);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}

?>