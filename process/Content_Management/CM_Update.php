<?php
    require_once "../../helpers/config.php";
?>

<?php
    if (isset($_POST)) {
        
        $id = $_POST["id"];
        $title = $_POST["title"];
        $caption = $_POST["caption"];

        $statement = $db->prepare("UPDATE content SET title = :title, caption = :caption WHERE id = :id");
        $result = $statement->execute(
            array(
                ':title'	=>	$title,
                ':caption'	=>	$caption,
                ':id'		=>	$id
            )
        );
        if(!empty($result))
        {
            echo 'Data Updated';
        }
    }
?>
