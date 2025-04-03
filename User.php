<?php
require_once 'Databass.php';
class User{

    private $db;

    public function __construct(){
        $this->db =(new Database())->conn;
    }
      // Read Users
    public function readAll() {
        $sql = "SELECT * FROM `users` ORDER BY `users`.`id` DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function read($id) {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Create User
    public function addUser($first_name, $last_name, $email, $bio, $image ){        
        $sql = "INSERT INTO users (first_name, last_name, email, bio, image) VALUES (:first_name, :last_name, :email, :bio, :image)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'first_name' => $first_name,
            'last_name' => $last_name,            
            'email' => $email,
            'bio' => $bio,
            'image' => $image,
        ]);
    }

     // Update User
     public function updateUser($id, $first_name, $last_name, $email, $bio, $image) {
        $sql = "UPDATE users 
            SET first_name = :first_name, 
                last_name = :last_name, 
                email = :email, 
                bio = :bio, 
                image = :image 
            WHERE id = :id;";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            'id' => $id,  
            'first_name' => $first_name,
            'last_name' => $last_name,            
            'email' => $email,
           
            'bio' => $bio,
            'image' => $image,
        ]);
    }

      // Delete User
      public function delete($id) {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(['id' => $id]);
    }

  
}

// $user = new User();



// $user->addUser("Peter", "Smith", "peter@example.com", "1234567890", "Updated Bio", "peter.jpg");
// $user->updateUser(2, "John", "Doe", "john@example.com", "1234567890", "Updated Bio", "profile.jpg");

// $new_user->delete( '1');
// echo '<pre>';
// print_r($user->readAll());




?>