<?php
    // if (isset($_POST['register'])) 
    // {
    //     //collection form data
    //     $user_fname =  $_POST['fname'];
    //     $user_lname =  $_POST['lname'];
    //     $user_gender = $_POST['gender'];
    //     $user_tel = $_POST['tel'];
    //     $user_email = $_POST['email'];
    //     $user_pass1 = $_POST['password1'];

    //     $test = "three";

    //     include("config.php");


    //     $encrypted_pass = md5($user_pass1);

    //     //write query

    //     $email_sql = "SELECT * FROM hostel_user WHERE user_email = '$user_email'";
    //     $email_result = $conn->query($email_sql);

    //     $tel_sql = "SELECT * FROM hostel_user WHERE user_tel = '$user_tel'";
    //     $tel_result = $conn->query($tel_sql);

    //     if ($email_result->num_rows > 0) {
    //         echo "<script>alert(try)</script>";
    //     }else if($tel_result->num_rows > 0){
    //         $error = "2";
    //     }else{
    //         $sql = "INSERT INTO hostel_user (first_name, last_name, user_tel, user_email, user_gender, user_password, user_role)
    //     VALUES ('$user_fname', '$user_lname', '$user_tel', '$user_email', '$user_gender', '$encrypted_pass', 1)";

    //     // check if query worked
    //     if ($conn->query($sql) === TRUE) {
        
    //         //redirect to homepage
    //         header("Location: login.html");
    //         exit();
        
    //     } else {
    //         //echo error but continue executing the code to close the session
    //         echo "Error: " . $sql . "<br>" . $conn->error;
    //     }

    //     // close database connection
    //     $conn->close();
        // }


    // }else{
    //     // //redirect to register page
    //     // header("Location: register.php");
    //     // echo "There's an error";
    //     // exit();
    // }
    session_start();
    // $_SESSION['email'] = 'test';

?>
<!DOCTYPE html>   
<html>   
<head>  
<meta name="viewport" content="width=device-width, initial-scale=1">  
<title> Register </title>  
<style>   
    body {  
    font-family: Calibri, Helvetica, sans-serif;  
    background-color: #0A2239 ;  
    margin: 0;
    padding: 0;
    }  

    button {   
        background-color:#0A2239 ;   
        width: 90%; 
        height: 60px; 

            color:white;   
            padding: 15px;   
            margin: 15px 20px;  
            border: none;   
            cursor: pointer;  
            border-radius: 5px;
    
            }   
    /* this is the styling for both of the input fields */
    input[type=email], input[type=password], input[type=text], select {   
            width: 90%;   
            height: 55px;
            margin: 15px 10px 5px 20px;  
            padding: 15px 40px;   
            display: inline-block;   
            border: none;            
            background-color: #F3F3F3 ;
            box-sizing: border-box; 
            /* color: #8b8888 ; */

            
        
        }

    #fname, #lname{
        /* background-repeat: no-repeat;
        background-size: 5%;
        background-position: 95%; */
    }
    
    #email{
        background-image: url("mdi_email.svg"); 
        background-repeat: no-repeat;
        background-size: 5%;
        background-position: 95%;
    }

    #password{
        background-image: url("material-symbols_lock.svg"); 
        background-repeat: no-repeat;
        background-size: 5%;
        background-position: 95%;
    }
    
    #tel{
        background-image: url("phone-call.png"); 
        background-repeat: no-repeat;
        background-size: 5%;
        background-position: 95%;
    }
    
    #fname, #lname{
        background-image: url("user1.png"); 
        background-repeat: no-repeat;
        background-size: 5%;
        background-position: 95%;
    }

    .container {   
        
        top: 25%;
        left: 50%;
        width: 30em;
        height: 44em;
        margin-top: -9em;
        margin-left: -15em;
        border: 1px solid #666;
        background-color: white ;
        position: fixed;
        border-radius: 7px;

    }   
    
    select:invalid{
        color: #8b8888 ;

    }

    .toptext{
        text-align: center;
        font-size: 10px;
        margin: auto;
    }
    
    .bottomtext{
        color: #8b8888 ;
        text-align: center;
        font-size: smaller;
        margin-top: 2px;

    }
    .header{
        text-align: center;
        margin-top: 25px;
        margin-bottom: 5px;
        /* font-size: larger; */
        color: #1DC4E7;
        font-family: Georgia, 'Times New Roman', Times, serif;
    }

    .right{
        float: right;
        font-size: small;
        margin: auto;
        padding: 0px 10px;
    }

    .icon{

        width: 60px;
        height: 45px;
        margin: 5px 60px 0px;
    }

    .icondiv{
        text-align: center;
    }

    .crossfade{
        margin: 0;
        padding: 0;
        /* background-image: url('hostel1.jpg'); */
    }

    .crossfade > figure {
        animation: imageAnimation 30s linear infinite 0s;
        backface-visibility: hidden;
        background-size: cover;
        background-position: center center;
        color: transparent;
        height: 100%;
        left: -40px;
        opacity: 0;
        position: fixed;
        top: -20px;
        width: 100%;
        z-index: 0;
        padding: 0;
    }

    .crossfade > figure:nth-child(1) { background-image: url('hostel1.jpg'); }
    .crossfade > figure:nth-child(2) {
    animation-delay: 6s;
    background-image: url('hostel2.jpg');
    }
    .crossfade > figure:nth-child(3) {
    animation-delay: 12s;
    background-image: url('hostel3.jpg');
    }
    .crossfade > figure:nth-child(4) {
    animation-delay: 18s;
    background-image: url('hostel4.jpg');
    }
    .crossfade > figure:nth-child(5) {
    animation-delay: 24s;
    background-image: url('hostel5.jpg');
    }
    
    @keyframes 
    imageAnimation {  
        0% {
        animation-timing-function: ease-in;
        opacity: 0;
        }
        8% {
            animation-timing-function: ease-out;
            opacity: 1;
        }
        17% {
            opacity: 1
        }
        25% {
            opacity: 0
        }
        100% {
            opacity: 0
        }
    }
   
</style>   
</head>    
<body>

    <div class="crossfade">
        <figure></figure>
        <figure></figure>
        <figure></figure>
        <figure></figure>
        <figure></figure>
    </div>   
    <form id="myForm" method="POST" action="register_proc.php" name="register">  
        <div class="container">
            <!-- <div class ="icondiv"><img class = "icon" src="bxs_leaf.svg"/></div> -->
            
            <h2 class="header">Bayview <span style="color: #0A2239;">Hostels</span></h2>  
            <p class="toptext" id="error" style="color: red; text-align: left;"></p> 
            <input type="text" placeholder="First Name" name="fname" id = "fname">  
            <br>
            <input type="text" placeholder="Last Name" name="lname" id = "lname">  
            <br>
            <select name="gender" id="gender" required>
                <option value="">Gender</option> <!--Placeholder-->
                <option value="M">M</option>
                <option value="F">F</option>
            </select>
            <input type="text" placeholder="Telephone Number" name="tel" id = "tel">  
            <br>
            <input type="email" placeholder="Email" name="email" id = "email">  
            <br>
            <input type="password" placeholder="Password" name="password1" id = "password1"> 
            <br>
            <input type="password" placeholder="Confirm Password" name="password2" id = "password2"> 
            
            <!-- <p class="right">Forgot password? </p>   -->
            <button name="register" type="submit" ><a style="text-decoration: none; color: white;">Register</a></button> 
            <p class="bottomtext">Already have an account? <a href="login.php">Log in</a></p>
            

            <!-- <p class="bottomtext">Don't have an account? Sign up <a href="#"> here </a> </p>   -->
        </div>   
    </form>
    
    
    
    <script type=text/javascript>
        // alert("Seems to be working");

		// function myvalidationpost(){
            
            // get form data
			var fname = "<?php echo $_SESSION['fname'];?>";
			var lname = "<?php echo $_SESSION['lname'];?>";
			var email = "<?php echo $_SESSION['email'];?>";
			var email = "<?php echo $_SESSION['email'];?>";
			var tel = "<?php echo $_SESSION['tel'];?>";
            
			// var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
           
            
        
			    // if(email.match(mailformat)){
                    // Error is assigned 1 if the email exists
                    if("<?php echo $_SESSION['error'];?>" == '1' && "<?php echo $_SESSION['error'];?>" == '2'){
                        document.getElementById('error').innerHTML = ("This email and number already exists");
                        document.getElementById('fname').value = fname;
                        document.getElementById('lname').value = lname;
                    }else if("<?php echo $_SESSION['error'];?>" == '4'){
                        document.getElementById("error").innerHTML = "Invalid password format";
                        document.getElementById('email').value = email;
                        document.getElementById('fname').value = fname;
                        document.getElementById('lname').value = lname;
                        document.getElementById('tel').value = tel;


                    }else if("<?php echo $_SESSION['error'];?>" == '1'){
                        document.getElementById('error').innerHTML = ("This email already exists");
                        document.getElementById('fname').value = fname;
                        document.getElementById('lname').value = lname;
                        document.getElementById('tel').value = tel;
                        
                    }else if("<?php echo $_SESSION['error'];?>" == '2'){
                        document.getElementById('error').innerHTML = ("This phone number already exists");
                        document.getElementById('fname').value = fname;
                        document.getElementById('lname').value = lname;
                        document.getElementById('email').value = email;
			        }else if("<?php echo $_SESSION['error'];?>" == '3'){
                        document.getElementById("error").innerHTML = "Invalid Email! Please try a different one";
                    }
                        
                        // }

        

	</script>

    <?php
        session_unset();
        session_destroy();
    ?>
</body>     
</html>  