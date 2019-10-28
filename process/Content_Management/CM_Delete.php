<?php
require_once "../../helpers/config.php";
?>

<?php
if (isset($_GET)) {

    $id = $_GET["id"];

    $statement = $db->prepare("DELETE from content WHERE id = :id");
    $result = $statement->execute(
        array(
        ':id' => $id
    )
    );
    if (!empty($result))
    {
        echo 'User Successfully Deleted!';
    }
}
?>
