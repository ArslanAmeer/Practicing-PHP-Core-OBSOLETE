<?php
    require_once "../../helpers/config.php";
?>

<?php
    if (isset($_POST)) {
        
        $id = $_POST["id"];
        $fullName = $_POST["fullName"];
        $email = $_POST["email"];

        $statement = $db->prepare("UPDATE users SET fullName = :fullName, email = :email WHERE id = :id");
        $result = $statement->execute(
            array(
                ':fullName'	=>	$fullName,
                ':email'	=>	$email,
                ':id'		=>	$id
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated';
        }
    }
?>
