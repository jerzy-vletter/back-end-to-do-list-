<?php

// dit is de page waar de lijsten gedisplayed worden, hier kan je ook nieuwe alle crud paginaas aanroepen

require "mainEngine.php";

$filterMod = '';

$result = fetchLists();

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
        <a id="createList" href="createList.php">add lijst</a>
        <form method="post">
            <input  type="submit" name="sortDuur" class="button" value="sort op duur"/>
            <input  type="submit" name="filterA" class="button" value="filter op taken die niet gestart zijn"/>
            <input  type="submit" name="filterB" class="button" value="filter op taken die bezig zijn"/>
            <input  type="submit" name="filterC" class="button" value="filter op taken die klaar zijn"/>
            <input  type="submit" name="filterD" class="button" value="filter op overige taken">
            <input  type="submit" name="showAll" class="button" value="show all">
        </form>
        <br></br>
        
            <?php foreach($result as $row){ ?> 
                <!-- Alle data van de opgehaalde rij in table row stoppen -->
            
            <table>
            <tr>
                <th>Lijstnaam</th>
                <th>Lijst updaten</th>
                <th>Lijst verwijderen</th>
                <th>Item toevoegen</th>
            </tr>
            <br>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><a id="editL" href="editList.php?id=<?php echo $row['id']; ?>">Update</a></td>
                <td><a id="deleteL" href="deleteList.php?id=<?php echo $row['id']; ?>">Verwijderen</a></td>
                <td><a id="createI" href="createItem.php?id=<?php echo $row['id']; ?>">Toevoegen</a></td>
                <?php
                
                /* function block, contains all the function executables for sorting, filtering and showing all the items after filtering */  
                $result2 = fetchTasksFromList($row['id']);

                if ($_POST['sortDuur']){
                    $result2 = sortDuur($row['id']);   
                }

                if ($_POST['filterA']) $result2 = filterSubjects('niet gestart', $row['id']);
                if ($_POST['filterB']) $result2 = filterSubjects('in progress', $row['id']);
                if ($_POST['filterC']) $result2 = filterSubjects("done", $row['id']);
                if ($_POST['filterD']) $result2 = filterSubjects('', $row['id']);
                if ($_POST['showAll']) $result2 = $result2;
                
                /* end of function block */
                
                ?>
                
            </tr>
            <tr>
                <th>Itemnaam</th>
                <th>Item text</th>
                <th>status</th>
                <th>duur</th>
                <th>item editen</th>
                <th>item verwijderen</th>
            </tr>
                <?php foreach($result2 as $row){ ?>
                    <!-- alle data van de opgehaalde rij in subjects in row stoppen -->
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['text']; ?></td>
                        <td><?php echo $row['tags']; ?></td>
                        <td><?php echo $row['tijd']; echo ' '; echo $row['tijd2']; ?></td>
                        <td><a id="editB" href="editItem.php?id=<?php echo $row['id']; ?>">edit</a></td>
                        <td><a id="deleteB" href="deleteItem.php?id=<?php echo $row['id']; ?>">delete</a></td>
                    </tr>
                <?php } ?>
            <?php } ?>
        </table>
    </body>
</html>

