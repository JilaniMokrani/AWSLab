
<?php
        $target_dir = "/img/";
        $image = $_FILES["fileToUpload"];
        $target_file = $target_dir . basename($image["name"]);
        rename($image["tmp_name"],"/var/www/html/img/".$image["name"]);
        shell_exec("aws s3 cp img/".$image["name"]." s3://jilaniensit/ --acl public-read --recursive");

        $servername = "database-1.cjtgh1icirxp.us-east-1.rds.amazonaws.com";
        $username = "admin";
        $password = "mypassword";
        $database = "myWebsiteDB";
        $port = 3306;

        $conn = new mysqli($servername, $username, $password, $database, $port);

        if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
        }

        $query ="INSERT INTO Images (url,title) VALUES (\"" . basename($image["name"]) . "\", \"" . $_POST["title"] . "\");";
        $conn -> query($query);
        header("Location: index.php");
?>
