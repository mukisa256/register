<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="styleSheet" href="style.css">
</head>
<body>
    <div class="main">
        <div class="sub-main">
            <h1>Register</h1>
            <form action="data-process.php" method="post" id="signup">
                <p>Name</p>
                <input type="text" name="name" required>
                <p>Address</p>
                <input type="email" name="email" required>
                <p>Phone</p>
                <input type="text" name="phone" required>
                <button type="submit" class="btn" name="submit">Submit</button>
            </form>

        </div>
    </div>
    <?php
         include 'data-process.php';
             $fetchedData = fetchData();
                echo "<h2>Fetched Data:</h2>";
                echo "<table border='1'>
                        <tr>
                            <th>Name</th><th>Address</th><th>Phone</th>
                        </tr>";

                foreach ($fetchedData as $row) {
                    echo "<tr>
                            <td>" . $row['Name'] . "</td><td>" . $row['Address'] . "</td><td>" . $row['Phone'] . "</td>
                        </tr>";
                }

                echo "</table>";
        
        
        ?>
</body>
</html>