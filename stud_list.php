<?php
    session_start();
    if($_SESSION['logged_in'] == true && $_SESSION['Role'] == 0){
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
    <link rel="stylesheet" href="stud_list.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
    <script src="stud_list.js"></script>
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
			<img src="person.jpeg" class="profile_image" alt="">
			<h4 id="user">Admin</h4>
		</center>
		
		<ul class="nav_links">
			<li><img src = "home.png" ><a href="admin_index.php"> Dashboard</a></li>
			<br>
			<li><img src = "list-text.png" ><a href="stud_list.php">Student List</a></li>
			<br>
			<li><img src = "sweeping.png" ><a href="cleaner.php">Cleaner Schedule</a></li>
			<br>
			<li><img src = "bed.png" ><a href="available_room.php">Room Availability</a></li>
			<br>   
			<a href="logout.php" class="logout_btn">Logout</a>
			
        </ul>
    </div>

           
    <div id="main">
        <h2 id="title">Stud<span id="head">ents</span></h2>
    
        <section>
            <table id ="stud_table" class="table table-striped table-borderless table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Year</th>
                        <th>Room</th>
                        <th>Hostel</th>
                    </tr>

                </thead>
                <tbody>

                    <tr>
                        <td>Alfreds Futterkiste</td>
                        <td>alfiefutter@gmail.com</td>
                        <td>+233 456 2473 954</td>
                        <td>Junior</td>
                        <td>D3</td>
                        <td>Dufie</td>
                        </tr>
                        <tr>
                        <td>Berglunds snabbköp</td>
                        <td>bergsnabb@gmail.com</td>
                        <td>+233 456 7890 234</td>
                        <td>Freshman</td>
                        <td>G2</td>
                        <td>Masere</td>
                        </tr>
                        <tr>
                        <td>Francisco Chang</td>
                        <td>franciscochang@gmail.com</td>
                        <td>+233 467 6543 423</td>
                        <td>Senior</td>
                        <td>T5</td>
                        <td>Tanko</td>
                        </tr>
                        <tr>
                        <td>Ernst Handel</td>
                        <td>ernst@gmail.com</td>
                        <td>+233 568 1233 788</td>
                        <td>Senior</td>
                        <td>J8</td>
                        <td>Dufie Annex</td>
                        </tr>
                </tbody>
                    
            </table>
                
        </section>
        
    </div>

    <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
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