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
        $servername = "pictures.cftgnvjnvxzz.us-east-1.rds.amazonaws.com";
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
                src=\"/images/". $row["url"] ."\">
               <h2>". $row["title"] ."</h2>");
            }
          } else {
            echo "0 results";
          }
        $conn->close();
    ?>

<?php
    print("
<form action=\"upload.php\" method=\"post\" enctype=\"multipart/form-data\">
  Select image to upload:
  <input type=\"file\" name=\"fileToUpload\" id=\"fileToUpload\" required>
  <input type=\"text\" name=\"title\" id=\"title\" required>
  <input type=\"submit\" value=\"Upload Image\" name=\"submit\">
</form>
</body>
</html>");
?>


