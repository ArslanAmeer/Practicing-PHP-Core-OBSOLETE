<?php
require_once("../helpers/config.php");

if (isset($_GET['vkey'])) {

    $vkey = $_GET['vkey'];

    $sql = "SELECT verified,vkey FROM users WHERE verified = 0 AND vkey = ?  LIMIT 1";
    $sqlstmnt = $db->prepare($sql);
    $result = $sqlstmnt->execute([$vkey]);
    if ($result) {
        // Valid Email
        $update = $db->prepare("UPDATE users SET verified = 1 WHERE vkey = ? LIMIT 1");
        $updated_result = $update->execute([$vkey]);
        if($updated_result){
            echo "Account Has Been Verfied! Login Now";
        } else{
            echo "Eror Occured while Verifying Account!";
        } 
    } else{
        echo "This account is Invalid or Already Verified!";
    }

} else{
    die('Something Went Wrong!');
}

?>
