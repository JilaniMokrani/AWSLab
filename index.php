<?php
    print("
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    </head>
    <body>
        <h1>Places I would Like to visit!</h1>");
?>

    <?php
        $servername = "pictures.cghowuarmo5g.us-east-1.rds.amazonaws.com";
        $username = "admin";
        $password = "mypassword";
        $database = "myWebsiteDB";
        $port = 3306;

        $conn = new mysqli($servername, $username, $password, $database, $port);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT * FROM Images;";

        $result = $conn -> query($query);

        if ($result->num_rows > 0) {

            while($row = $result->fetch_assoc()) {
                print("
		<img style=\"margin:12px 0 0 0;width:500px;height:281px\" 
		src=\"https://imagesjilani.s3.amazonaws.com/". $row["url"] ."\">
               <h2>". $row["title"] ."</h2>");
            }
          } else {
            echo "0 results";
          }
        $conn->close();
    ?>


<?php
    print("
</body>
</html>");
?>

