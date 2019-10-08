<?php
    session_start();
    require_once("../helpers/config.php");
?>

<?php
    if (isset($_POST)) {

        $email = $_POST["email"];
        // $password = $_POST["password"];
        $password = sha1($_POST["password"]);

        $sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
        $sqlstmnt = $db->prepare($sql);
        $result = $sqlstmnt->execute([$email, $password]);
        if ($result) {
            $user = $sqlstmnt->fetch(PDO::FETCH_ASSOC);
            if($sqlstmnt->rowCount() > 0){
                if ($user['verified'] == 0) {
                    // $data['msg'] =  "Verify Your Email First!";
                    // $data['isError'] =  false;
                    // die(json_encode($data));
                    echo "EMAIL NOT VERIFIED! Verify Your Email First!";
                    die;
                }else{
                    $_SESSION['userLogin'] = $user;
                    echo "1";
                }
            }else{
                echo "No User Found! Recheck Email & Password or Register";
            }
        } else {
            echo "OOPS! An Error Occured!";
        }

    }else{
        echo 'No data';
    }
