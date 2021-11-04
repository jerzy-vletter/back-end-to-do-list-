
<?php

#this is the "brain" behind the project, all the function runs will be executed from here


#inserting data from the add item form into the database


function createList($conn, $taakname, $listname){

    #insert using data created and made into variables on the createItem.php page.
        $pdoQuery = "INSERT INTO list(name, list) VALUES (:taakname, :listname)"; 
        $pdoQuery_run = $conn->prepare($pdoQuery);
        $pdoQuery_run->bindParam(':taakname', $taakname);
        $pdoQuery_run->bindParam(':listname', $listname);
        $pdoQuery_run->execute();

}

function editItem($conn, $EditTaakName, $EditListName, $id){

    $pdoQuery = "UPDATE list SET name = '".$EditTaakName."', list = '".$EditListName."' WHERE id=$id";
    $stmt = $conn->prepare($pdoQuery);
    $stmt->execute();
    
};

function deleteItem(){
    
}

?>