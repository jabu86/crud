<?php
require_once '../User.php';

if ($_POST['id']) {
    $user = new User();
    $result = $user->delete($_POST['id']);
    echo $result ? "User deleted successfully!" : "Error deleting user.";
}
?>