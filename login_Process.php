<?php
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
                echo "1";
            }else{
                echo "No User Found!";
            }
        } else 
        
        {
            echo "Error While Saving Data!";
        }

    }else{
        echo 'No data';
    }
