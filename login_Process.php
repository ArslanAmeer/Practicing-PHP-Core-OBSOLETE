<?php
    session_start();
    require_once("config.php");
?>

<?php
    if (isset($_POST)) {

        $email = $_POST["email"];
        $password = $_POST["password"];
        // $password = sha1($_POST["password"]);

        $sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
        $sqlstmnt = $db->prepare($sql);
        $result = $sqlstmnt->execute([$email, $password]);
        if ($result) {
            $user = $sqlstmnt->fetch(PDO::FETCH_ASSOC);
            if($sqlstmnt->rowCount() > 0){
                $_SESSION['userLogin'] = $user;
                echo "Login Successfull";
            }else{
                echo "No User Found! or REGISTER";
            }
        } else 
        
        {
            echo "Error While Saving Data!";
        }

    }else{
        echo 'No data';
    }
