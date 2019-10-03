<?php
    require_once("config.php");
    
    if (isset($_POST)) {

        $firstName = $_POST["firstName"];
        $lastName = $_POST["lastName"];
        $email = $_POST["email"];
        // $password = $_POST["password"];
        $password = sha1($_POST["password"]);
        $phone = $_POST["phone"];
        $vkey = md5(time().$firstName);

        $sql = "INSERT INTO users (firstName, lastName, email, password, phone, vkey) VALUES (?,?,?,?,?,?)";
        $sqlstmnt = $db->prepare($sql);
        $result = $sqlstmnt->execute([$firstName, $lastName, $email, $password, $phone, $vkey]);
        if ($result) {
            $to = $email;
            $subject = "User Account Verification | Arslan Php Demo";
            $message = "<a style='padding: 30px 50px; text-align: center; background-color: lightblue; color: black' href='http://localhost:70/arslan/verify_Account.php?vkey=$vkey'>Verify Your Account</a>";
            $headers = "From: lk2712.svcs@gmail.com\r\n";
            // Set content-type header for sending HTML email 
            $headers .= "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

            if ( mail($to,$subject,$message,$headers)) {
                echo "User Register Successfully!";
             } else {
                echo "ERROR while sending Email!";
             }

        } 
        else{
            echo "Error While Saving Data!";
        }

    } else{
        echo 'No data';
    }
?>
