<?php 

//check if register form was submited
//by checking if the submit button element name was sent as part of the request

if (isset($_POST['login'])) 
{
    // echo "1 came through";
	$log_email =  $_POST['email'];
    $log_pass = $_POST['password'];
    $encrypted_pass = md5($log_pass);


    // Connect to the db
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bayview_hostels";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    		//stop executing the code and echo error
    	  die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM hostel_user WHERE user_email = '$log_email'";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		$row = $result->fetch_assoc();

		$result_id = $row['user_id'];
		$result_fname = $row['first_name'];
		$result_lname = $row['last_name'];
		$result_tel = $row['user_tel'];
		$result_gender = $row['user_gender'];
		$result_email = $row['user_email'];
		$result_pword = $row['user_password'];
		$result_role = $row['user_role'];

		if($encrypted_pass == $result_pword){
            session_start();
            $_SESSION["ID"] = $result_id ;
            $_SESSION["Fname"] = $result_fname ;
            $_SESSION["Lname"] = $result_lname ;
            $_SESSION["Gender"] = $result_gender ;
            $_SESSION["Number"] = $result_number ;
            $_SESSION["Tel"] = $result_tel ;
            $_SESSION["Email"] = $result_email ;
            $_SESSION["Role"] = $result_role ;
            $_SESSION["logged_in"] = true;
            
            if($result_role == 0){
                header("Location: admin_index.php");
            }else{
                header("Location: user_index.php");
            }
 
		}else{
			// TODO: Show Incorrect email or password above the email
            echo "Incorrect Password. Please try again";
			exit();
		}
		
	}else {
		header("Location: login.html");
	}
      $conn->close();
}else{
    //redirect to login page
    header("Location: login.html");
    exit();
}


?>