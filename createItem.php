<!DOCTYPE html>
<html>
    <head>
        <h1>CREATE YOUR ITEMS</h1>
    </head>
    <body>
        <form action="index.php" method="post">
        
            Name:  <input type="text" name="listName" /><br />
            <input type="submit" name="submit" value="create item" />
        </form>
    </body>
</html>
 
 <?php 
 
 #hier wordt alles geregeld wat te maken heeft met het addden van items
 
 echo $_POST['listName'];
 echo $_REQUEST['listName'];


 
 ?>