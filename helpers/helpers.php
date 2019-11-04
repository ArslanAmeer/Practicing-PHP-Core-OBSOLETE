<?php

function checkSessionActive(){
    $autologout=30;
    $lastactive = $_SESSION['timestamp'] ?? 0;
    if (time()-$lastactive > $autologout){
	    $_SESSION = array();                            // Clear the session data
        setcookie(session_name(), false, time()-3600);     // Clear the cookie
        session_destroy();
        header("Location: views/login.php");                         // Destroy the session data
    }else { 
		$_SESSION['timestamp']=time();              //Or reset the timestamp
	}

    // $time = $_SERVER['REQUEST_TIME'];
    // $timeout_duration = 20;
    // if (isset($_SESSION['LAST_ACTIVITY']) && 
    // ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    //     session_unset();
    //     session_destroy();
    //     session_start();
    // }
    // $_SESSION['LAST_ACTIVITY'] = $time;
}
?>