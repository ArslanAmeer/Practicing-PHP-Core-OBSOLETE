<?php
    require_once("config.php");
?>

<?php
    if (isset($_POST)) {

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        // $password = $_POST["password"];
        $password = sha1($_POST["password"]);
        $phone = $_POST["phone"];

        $sql = "INSERT INTO users (firstName, lastName, email, password, phone) VALUES (?,?,?,?,?)";
        $sqlstmnt = $db->prepare($sql);
        $result = $sqlstmnt->execute([$firstName, $lastName, $email, $password, $phone]);
        if ($result) {
            echo "User Register Successfully!";
        } else 
        
        {
            echo "Error While Saving Data!";
        }

    }else{
        echo 'No data';
    }
