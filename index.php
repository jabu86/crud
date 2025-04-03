<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <link rel="stylesheet" href="public/css/style.css">
    <script src="public/js/jquery.js"></script>
    <script src="public/js/main.js"></script>
</head>
<body>
    <div class="container">
        
        <div class="header-wrapper">            
            <h1>User management</h1>
        </div>
        
        <div class="wrapper">
            <div class="user-count"></div>
            <div class="user-table">
                <button class="btn primary" id="open-btn">Add new user</button>
                <div class="success-message"></div>
                <div class="remove-message"></div>
                <div id="id01" class="modal">                  
                    <form class="modal-content animate" id="userForm"  enctype="multipart/form-data">
                        <input type="hidden" name="id" id="user_id">
                        <div class="imgcontainer">
                            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                            <h3 class="modal-header"></h3>
                            <hr style="color:#c5c5c5; margin-bottom:25px;"/>
                            <img src="public/images/profile.png" alt="Avatar" class="avatar" id="profileImage">
                        </div>
                        
                        <div class="input-wrapper">
                            <label for="first_name"><b>Name</b></label>
                            <input type="text" placeholder="Enter Name" id="first_name" name="first_name" required>
                            <label for="last_name"><b>Surname</b></label>
                            <input type="text" placeholder="Enter Surname" id="last_name" name="last_name" required>
                            <label for="email"><b>Email</b></label> 
                            <input type="email" placeholder="Enter Email" id="email" name="email" required>
                            <label for="bio"><b>Bio</b></label>
                            <textarea name="bio" id="bio">Tell us about yourself?</textarea>    
                            <label for="image"><b>Profile Image</b></label> <br/>
                            <input type="file" name="image" id="image">   
                            <span id="imageError" class="error"></span> <br/>                                                                       
                        </div>
                        
                        <div class="button-wrapper">
                            <button type="submit" class="btn primary">Save</button>
                            <button type="button" id="close-model" class="btn danger">Cancel</button>                        
                        </div>
                        <div style="clear:both"></div>
                    </form>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Name</th>
                            <th>Email</th>
                            <th>Bio</th>
                            
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody id="userTableBody">
                        <!-- Users will be loaded here via AJAX -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>