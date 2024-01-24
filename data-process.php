<?php
function connectToDatabase() {
    $con = mysqli_connect("localhost", "root", "", "Data");
    if($con === false){
        die("Connection Error: " . mysqli_connect_error());
    }
    return $con;
}

function insertData($name, $address, $phone) {
    $con = connectToDatabase();
    $query = "INSERT INTO process (Name, Address, Phone) VALUES ('$name', '$address', '$phone')";
    $result = mysqli_query($con, $query);
    mysqli_close($con);
    return $result;
}

function fetchData() {
    $con = connectToDatabase();
    $fetchQuery = mysqli_query($con, "SELECT * FROM process");
    $data = array();

    if($fetchQuery) {
        while($row = mysqli_fetch_assoc($fetchQuery)) {
            $data[] = $row;
        }
    } else {
        echo "Error fetching data: " . mysqli_error($con);
    }

    mysqli_close($con);
    return $data;
}

// Check if the form is submitted for saving data
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['email'];
    $phone = $_POST['phone'];

    $insertResult = insertData($name, $address, $phone);

    if($insertResult) {
        echo "<script>alert('Data inserted successfully')</script>";
    } else {
        echo "<script>alert('There is an error')</script>";
    }
}


?>
