<?php

require "connection.php";
require "mainUIPage.php";
require "mainEngine.php";

$sql = 'SELECT * FROM list';
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="TDL.css">
        <title>to-do-list</title>
    </head>
    <body>  
        <a id="createItem" href="createItem.php">add item</a>
        <a id="deleteItem" href="deleteItem.php">delete item</a>
        <br></br>
        
        <table>
            <tr>
                <th>Listname</th>
                <th>Update</th>
                <th>Verwijderen</th>
            </tr>
            <?php foreach($result as $row){ ?> 
                <!-- Alle data van de opgehaalde rij in table row stoppen -->
            <tr>
                <td><?php echo $row['list']; ?></td>
                <td><a href="editItem.php?id=<?php echo $row['id']; ?>">Update</a></td>
                <td><a href="deleteItem.php?id=<?php echo $row['id']; ?>">Verwijderen</a></td>
            </tr>    
            <?php } ?>
        </table>
    </body>
</html>