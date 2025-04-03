<?php
require_once '../User.php';

if (isset($_GET['id'])) {
    $user = new User();
    echo json_encode($user->read($_GET['id']));
}
?>