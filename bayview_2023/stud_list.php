<?php
    session_start();
    if($_SESSION['logged_in'] == true && $_SESSION['role'] == 0){
    }else{
        header("Location: register.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="./CSS/stud_list.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="./JavaScript/stud_list.js"></script>
</head>
<body>
    
    <div class="top_navbar">
		<div class="menu">
			
			<h3>Bayview <span>Hostels</span>
			
				<button class="hamburger" onclick="openNav()">☰ </button>  
			</h3>
			
		</div>
	</div>
	
	<div id="mySidebar" class="sidebar">
		<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
		<center>
			<img src="./images/person.jpeg" class="profile_image" alt="">
			<h4 id="user">Admin</h4>
		</center>
		
		<ul class="nav_links">
			<li><img src = "./images/home.png" ><a href="admin_index.php"> Dashboard</a></li>
			<br>
			<li><img src = "./images/list-text.png" ><a href="stud_list.php">Student List</a></li>
			<br>
			<li><img src = "./images/sweeping.png" ><a href="cleaner.php">Cleaner Schedule</a></li>
			<br>
			<li><img src = "./images/bed.png" ><a href="available_room.php">Room Availability</a></li>
			<br>   
			<a href="logout.php" class="logout_btn">Logout</a>
			
        </ul>
    </div>

           
    <div id="main">
        <h2 id="title">Stud<span id="head">ents</span></h2>
        
        <div id="drop">
            <p>Select a term and academic year</p>
                <form method="POST" name="<?php echo $_SERVER['PHP_SELF'];?>">
                    <select name="Academic_Year" id="year" required>
                        <!-- <option value="">Academic Year</option> -->
                        <option value="2020/2021">2020/2021</option>
                        <option value="2021/2022">2021/2022</option>
                        <option value="2022/2023">2022/2023</option>
                    </select>
                    <select name="Term" id="term" required>
                        <option value="Term One">Term One</option>
                        <option value="Term Two">Term Two</option>
                        <option value="Term Three">Term Three</option>
                    </select>
                <form>
            <button id="go" type="submit">Go</button>
        </div>
    
        <section>
            <table id ="stud_table" class="table table-striped table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Room</th>
                        <th>Hostel</th>
                    </tr>

                </thead>
                <tbody>
                    <?php
                        if($_SERVER["REQUEST_METHOD"] == "POST"){
                            include('config.php');

                            $year = $_REQUEST['Academic_Year'];
                            $term = $_REQUEST['Term'];

                            $stud_sql = "SELECT CONCAT(`first_name`, ' ', `last_name`) 'Name', `user_email` 'Email', 
                                        `user_tel` 'Phone_Number',  `room_name` 'Room',  `block_name` 'Hostel'
                                        FROM ((booking INNER JOIN hostel_user ON booking.student_id = hostel_user.user_id) 
                                        INNER JOIN room on booking.room_id = room.room_id) INNER JOIN block on room.block_id =  block.block_id
                                        WHERE year_id IN (SELECT academic_year.year_id FROM academic_year WHERE a_year = '$year')
                                        AND term_id IN (SELECT school_term.term_id FROM school_term WHERE term = '$term')";

                            // $stud_sql = "SELECT * FROM hostel_user   WHERE first_name = 'Abdul'";

                            $stud_result = $conn->query($stud_sql);

                            while($stud_row = $stud_result->fetch_assoc()){
                                echo "<tr>
                                      <td>$stud_row[Name]</td>
                                      <td>$stud_row[Email]</td>
                                      <td>$stud_row[Phone_Number]</td>
                                      <td>$stud_row[Room]</td>
                                      <td>$stud_row[Hostel]</td>
                                      </tr>
                                      ";
                                    }
                        }
                    ?>

                </tbody>
                    
            </table>
                
        </section>
        
    </div>

    <script>
        function openNav() {
          document.getElementById("mySidebar").style.width = "250px";
          document.getElementById("main").style.marginLeft = "250px";
        }
        
        function closeNav() {
          document.getElementById("mySidebar").style.width = "0";
          document.getElementById("main").style.marginLeft= "0";
        }
        </script>
</body>
</html>