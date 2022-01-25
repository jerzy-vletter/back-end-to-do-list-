this is just a file to help me remember sertain important things

language = php pdo

if you pull an array you need to loop over it to get it displayed, even if it's only 1 value long.


template for pulling items

$sql = 'SELECT * FROM [where]';
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();

template for looping

foreach($result as $row){
    print $row['name'];
}

to do today (19/11/2021)
    - double check the name of the item table and cross reference that with the name i put into the deleteItem stuff. (done)
    - item selection (mogelijk door id van het item mee te geven in de url en die op te halen) (reworked tot [maak de items crud able]) (done) 
    - display items onto the page while sorting them to the list they below to, using listId. (done)
    - double check with ed. (niet aanwezig)


    - 