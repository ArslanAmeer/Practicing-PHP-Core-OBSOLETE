<?php
session_start();
require_once "../helpers/config.php";

?>

<?php
if (isset($_POST)) {

    $email = $_POST["email"];
    $password = $_POST["password"];
    $enc_password = sha1($_POST["password"]);
    $rememberMe = $_POST["rememberMe"];

    $sql = "SELECT * FROM users WHERE email = ? AND password = ? LIMIT 1";
    $sqlstmnt = $db->prepare($sql);
    $result = $sqlstmnt->execute([$email, $enc_password]);
    if ($result) {
        $user = $sqlstmnt->fetch(PDO::FETCH_ASSOC);
        if ($sqlstmnt->rowCount() > 0) {
            if ($user['verified'] == 0) {
                // $data['msg'] =  "Verify Your Email First!";
                // $data['isError'] =  false;
                // die(json_encode($data));
                echo "EMAIL NOT VERIFIED! Verify Your Email First!";
                die;
            } else {
                $_SESSION['userLogin'] = $user;
                $_SESSION['timestamp']=time();
                if ($rememberMe == 'true') {
                    setcookie("loginId", $user['email'], time() + (10 * 365 * 24 * 60 * 60),"/",false);
                    setcookie("loginPass", $user['password'] == $enc_password ? $password : $enc_password, time() + (10 * 365 * 24 * 60 * 60),"/",false);
                    setcookie("lastRemember", $rememberMe, time() + (10 * 365 * 24 * 60 * 60),"/",false);
                } else {
                    setcookie("loginId", NULL, 0, "/");
                    setcookie("loginPass", NULL, 0, "/");
                    setcookie("lastRemember", NULL, 0, "/");
                    unset($_COOKIE["loginId"]);
                    unset($_COOKIE["loginPass"]);
                    unset($_COOKIE["lastRemember"]);
                }
                echo "1";
            }
        } else {
            echo "No User Found! Recheck Email & Password or Register";
        }
    } else {
        echo "OOPS! An Error Occured!";
    }

} else {
    echo 'No data';
}
