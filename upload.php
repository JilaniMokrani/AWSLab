
<?php
        $image = $_FILES["fileToUpload"];
        
	rename($image["tmp_name"],"/var/www/html/img/".basename($image["name"]));
        shell_exec("aws s3 mv img/ s3://cloudjilaniensit/ --acl public-read --recursive");

        $servername = "pictures.cftgnvjnvxzz.us-east-1.rds.amazonaws.com";
        $username = "admin";
        $password = "mypassword";
        $database = "myWebsiteDB";
        $port = 3306;

        $conn = new mysqli($servername, $username, $password, $database, $port);

        if ($conn->connect_error) 
        {
                die("Connection failed: " . $conn->connect_error);
        }
        
        $query ="INSERT INTO Images (url,title) VALUES (\"" . basenama($image["name"]) . "\", \"" . $_POST["title"] . "\");";
        $conn -> query($query);
        
        header("location: index.php");
?>
~                                                                                                                                                                                
~                                                                                                                                                                                
~                                                                                                                                                                                
~                                                                                                                                                                                
~                                 
