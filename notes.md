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