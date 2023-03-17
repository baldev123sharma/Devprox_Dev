<?php 
/* Connection */
include 'connection.php'; 
?>
<?php
/* Form Data */
$name = $_REQUEST['name'];
$surname = $_REQUEST['surname'];
$id_no = $_REQUEST['id_no'];
$dob = $_REQUEST['dob'];

/* Check Duplicate id_no */

$sql = "SELECT * FROM users WHERE id_no = $id_no ";
$result = $conn->query($sql);

if ($result->num_rows > 0){
    echo "This id already exists"; 
} else {
    /* Insert Data */

    $sql = "INSERT INTO users (name,surname,id_no,dob) VALUES ('$name', '$surname', '$id_no','$dob')";
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } 
}

?>