<?php
$servername = "localhost";
$username = "root";
$password = "abc123";
$dbname = "registerdb";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $street_address = $_POST['street_address'];
    $region = $_POST['region'];
    $postal_code = $_POST['postal_code'];

    $sql = "INSERT INTO regdata_table (full_name, student_id, email, phone_number, birth_date, gender, street_address, region, postal_code)
            VALUES ('$full_name', '$student_id', '$email', '$phone_number', '$birth_date', '$gender', '$street_address', '$region', '$postal_code')";



    $sql2 = "SELECT * FROM registerdb.regdata_table"; 

    $result = $conn->query($sql2);

    if($result== true){ 
        if ($result->num_rows > 0) {
           $row= mysqli_fetch_all($result, MYSQLI_ASSOC);
           $msg= $row;
        } else {
           $msg= "No Data Found"; 
        }
       }else{
         $msg= mysqli_error($conn);
       }



    if ($conn->query($sql) === TRUE) {
        echo "Record added successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


    
}

$conn->close();
?>
