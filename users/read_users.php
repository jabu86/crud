<?php
require_once '../User.php';

$users = new User();

$getUsers = $users->readAll();
$output = "";
foreach ($getUsers as $row) {
    $output .= "
        <tr>
            <!--<td>{$row['id']}</td>-->
            <td>{$row['first_name']} {$row['last_name']}</td>
            <td>{$row['email']}</td>
            <td>{$row['bio']}</td>            
                
            <td>
                <button id='edit-user' class='btn secondary edit-btn' data-id='{$row['id']}'>Edit</button>
                <button id='delete-user' class='btn danger delete-btn' data-id='{$row['id']}'>Delete</button>
            </td>
        </tr>";
}
echo $output;


?>