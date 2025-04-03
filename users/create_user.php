<?php

require_once '../User.php';

$user = new User();
if ($_POST) {
    // print_r(realpath('public/images/'));
    $imagePath = "";
    if (!empty($_FILES['image']['name'])) {
        $targetDir =  "../public/images/";  // Absolute path to 'public/images'
        $fileName = time() . "_" . basename($_FILES["image"]["name"]);
        $targetFilePath = $targetDir . $fileName;
        
        // Check if directory exists, if not, create it
        if (!file_exists($targetDir)) {
            mkdir($targetDir, 0777, true);
        }
        
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {
            echo "File uploaded successfully!";
        } else {
            echo "File upload failed!";
        }

    }else{
        $fileName = 'profile.png';
    }
        $result = $user->addUser(
        $_POST['first_name'],
        $_POST['last_name'],
        $_POST['email'],
        $_POST['bio'],
        $fileName
        );
    echo $result ? "User created successfully!" : "Error creating user.";
}


?>