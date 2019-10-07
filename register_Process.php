<?php
    require_once("config.php");
    
    if (isset($_POST)) {

        $name = $_POST["name"];
        $email = $_POST["email"];
        // Check If Email is registered
        $exists = userExists($db, $email);
        if($exists)
        {
            $data['msg'] =  "Email Already Registered! ";
            $data['isError'] =  true;
            die(json_encode($data));
        }
        $password = $_POST["password"];
        $con_password = $_POST["confirmPassword"];
        // Check If Password Did Match
        if ($password !== $con_password) {
            $data['msg'] =  "Passsword Did Not Match";
            $data['isError'] =  true;
            die(json_encode($data));
        }            
        $phone = $_POST["phone"];
        $vkey = md5(time().$name);
        // After Clearing Above Validation Insert User into Database
        $sql = "INSERT INTO users (fullName, email, password, phone, vkey) VALUES (?,?,?,?,?)";
        $sqlstmnt = $db->prepare($sql);
        $result = $sqlstmnt->execute([$name, $email, sha1($con_password), $phone, $vkey]);
        if ($result) {
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


    function userExists($db, $email)
{
    $userQuery = "SELECT * FROM users u WHERE u.email=:email;";
    $stmt = $db->prepare($userQuery);
    $stmt->execute(array(':email' => $email));
    return !!$stmt->fetch(PDO::FETCH_ASSOC);
}
?>
