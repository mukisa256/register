<?php
    $con = mysqli_connect("localhost", "root", "", "Data");
    if($con == false){
        die("connection Error:".mysqli_connect_error());
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $address = $_POST['email'];
        $phone = $_POST['phone'];
    
        // Insert data into the database
        $query = mysqli_query($con,"INSERT INTO process (Name, Address, Phone) VALUES ('$name','$address','$phone')");

        if($query){
            echo "<script>alert('Data inserted successfully')</script>";
        } 
        else{
            echo "<script>alert('There is an error')</script>";
        }
    }

    
    $fetchQuery = mysqli_query($con, "SELECT * FROM process");
    if($fetchQuery) {
        echo "<h2>Fetched Data:</h2>";
        while($row = mysqli_fetch_assoc($fetchQuery)) {
            echo "<p>Name: ".$row['Name']." | Address: ".$row['Address']." | Phone: ".$row['Phone']."</p>";
        }
    } else {
        echo "Error fetching data: ".mysqli_error($con);
    }

    mysqli_close($con);
?>
