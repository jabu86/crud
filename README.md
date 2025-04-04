Installation Instructions
Step 1: Download and Install WAMP or XAMPP
	Download WAMP from wampserver.com.
	Download XAMPP from apachefriends.org.
	Install the selected server by following the on-screen instructions.

Step 2: Start the Server
	For WAMP:
	Click the Start Menu → Search for WAMP Server → Click to open.
	The WAMP icon in the taskbar should turn green (indicating all services are running).

	For XAMPP:
	Open XAMPP Control Panel.
	Click Start for Apache and MySQL.

Step 3: Set Up the Project
	Copy the crud folder into the web server directory:
	For WAMP: Paste into C:\wamp64\www\.
	For XAMPP: Paste into C:\xampp\htdocs\.

Step 4: Set Up the Database
	Open your web browser and go to phpMyAdmin.
	Click New and create a database named crud.

	Import the SQL file:

	Click on the crud database → Click Import.

	Select the crud.sql file from the crud folder.

	Click Go to execute the import.

Step 5: Run the Application
Open a web browser.

Navigate to:
WAMP: http://localhost/crud/
XAMPP: http://localhost/crud/

Your CRUD application should now be running! 
