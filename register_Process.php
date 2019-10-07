<?php
    require_once("config.php");
    
    if (isset($_POST)) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        // $password = $_POST["password"];
        $password = $_POST["password"];
        $con_password = $_POST["confirmPassword"];
        if ($password !== $con_password) {
            $data['msg'] =  "REGISTRATION FAILED! Passsword Did Not Match";
            $data['isError'] =  true;
            die(json_encode($data));
        }            
        $phone = $_POST["phone"];
        $vkey = md5(time().$name);

        $sql = "INSERT INTO users (fullName, email, password, phone, vkey) VALUES (?,?,?,?,?)";
        $sqlstmnt = $db->prepare($sql);
        $result = $sqlstmnt->execute([$name, $email, $con_password, $phone, $vkey]);
        if ($result) {
            // $data['msg'] =  "User Registered Successfully!";
            // $data['isError'] =  false;
            // die(json_encode($data));
            $to = $email;
            $subject = "User Account Verification | Arslan Php Demo";
            $message = "<a style='padding: 30px 50px; text-align: center; background-color: lightblue; color: black' href='http://localhost:70/arslan/verify_Account.php?vkey=$vkey'>Verify Your Account</a>";
            $headers = "From: lk2712.svcs@gmail.com\r\n";
            // Set content-type header for sending HTML email 
            $headers .= "MIME-Version: 1.0" . "\r\n"; 
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 

            if ( mail($to,$subject,$message,$headers)) {
                $data['msg'] =  "User Register Successfully! Verify Your Email!";
            $data['isError'] =  false;
            die(json_encode($data));
             } else {
                $data['msg'] =  "User Register Successfully! ERROR while Sending EMAIL";
                $data['isError'] =  false;
                die(json_encode($data));
             }

        } 
        else{
            $data['msg'] =  "OOPS! Error While Saving Data!";
            $data['isError'] =  true;
            die(json_encode($data));
        }

    } else{
        $data['msg'] =  "No data!";
        $data['isError'] =  true;
        die(json_encode($data));
    }
?>
