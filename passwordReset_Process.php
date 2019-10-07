<?php
    require_once("config.php");
?>

<?php
    if (isset($_POST)) {
        $random_password = random_int(100000,999999);
        $encypt_random_password = sha1($random_password);
        $email = $_POST["email"];
        $sql = "SELECT * FROM users WHERE email = ? LIMIT 1";
        $sqlstmnt = $db->prepare($sql);
        $result = $sqlstmnt->execute([$email]);
        if ($result) {
            $user = $sqlstmnt->fetch(PDO::FETCH_ASSOC);
            if($sqlstmnt->rowCount() > 0){
                $sql_update = "UPDATE users SET password=?, verified=1 WHERE email=?";
                $sqlstmnt_update = $db->prepare($sql_update);
                $result_update = $sqlstmnt_update->execute([$encypt_random_password, $email]);
                if ($result_update) {
                    $to = $email;
                    $subject = "Password Recovery | Arslan Php Demo <No-Reply>";
                    $message = "Please Use This Password: $random_password , Next Time you login with: $email.";
                    $headers = "From: lk2712.svcs@gmail.com\r\n";
                    // Set content-type header for sending HTML email 
                    $headers .= "MIME-Version: 1.0" . "\r\n"; 
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n"; 
        
                    if ( mail($to,$subject,$message,$headers)) {
                        echo "1";
                        exit;
                        die(json_encode($data));
                    } else {
                        echo 'ERROR OCCURED! Try Again!';
                        exit;
                    }        
                    
                } else{
                    echo " OOPS! An Error Occured! Try Again!";
                    exit;
                }
            }else{
                echo "Invalid Email or Password!";
                exit;
            }
        } else {
            echo "OOPS! An Error Occured!";
            exit;
        }

    }else{
        echo 'No data';
        exit;
    }
