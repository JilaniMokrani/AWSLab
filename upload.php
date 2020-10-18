
<?php
        $target_dir = "/img/";
        $image = $_FILES["fileToUpload"];
        $target_file = $target_dir . basename($image["name"]);
        rename($image["tmp_name"],"/var/www/html/img/".$image["name"]);
        system("aws s3 cp img/ s3://cloudjilaniensit/ --acl public-read --recursive");

        $servername = "pictures.cftgnvjnvxzz.us-east-1.rds.amazonaws.com";
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
