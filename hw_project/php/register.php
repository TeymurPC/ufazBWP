<?
    include_once "mysqli_config.php";
    if(isset($_POST["first-name"]) && isset($_POST["last-name"]) && isset($_POST["email"]) && isset($_POST["password"])){
        if(!empty($_POST["first-name"]) && !empty($_POST["last-name"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
            if ($stmt = $conn->prepare('INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)')) {
                $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
                $stmt->bind_param('ssss', $_POST["first-name"], $_POST["last-name"], $_POST["email"], $pass);
                $stmt->execute();
                // TODO: redirect to another page
            }else{
                die("Something went wrong!");
            }
        }else{
            die("Empty fields exist!");
        }
    }else{
        die("Some parameters wasn't submitted!");
    }

?>