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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="available_room.css">
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    
    <script src="available_room.js"> </script>



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
			<h4 id="name">Admin</h4>
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
            <h2>Room <span id = "head">Availability</span> </h2>
            <section id="info_boxes">
                <div id="info1">
                    <span class="head"> Abdi Hostel</span>
                    <span class="details"><ul>
                      <li>Premium Male Block</li>
                      <li>24 rooms</li>
                    </ul></span>
                    <span class="bottom"> See Availability
                        <!-- <span><i class="fa-regular fa-caret-down"></i></span> -->
                        <span><a href="#" onclick= 'showTable(1)'><img id="arrow" src="down_arrow.png"></a></span>

                    </span>
                </div>
                <div id="info2">
                    <span class="head"> Haligah Hostel</span>
                    <span class="details"><ul>
                      <li>Regular Female Block</li>
                      <li>18 rooms</li>
                    </ul></span>
                    <span class="bottom"> See Availability
                        <span><a href="#" onclick= 'showTable(2)'><img id="arrow" src="down_arrow.png"></a></span>

                    </span>
                    
                </div>
                <div id="info3">
                    <span class="head"> Niang Hostel</span>
                    <span class="details"><ul>
                      <li>Regular Male Block</li>
                      <li>18 rooms</li>
                    </ul></span>
                    <span class="bottom"> See Availability
                        <span><a href="#" onclick= 'showTable(3)'><img id="arrow" src="down_arrow.png"></a></span>
                    </span>

                    
                </div>
                <div id="info4">
                    <span class="head"> Maatalla Hostel</span>
                    <span class="details"><ul>
                      <li>Premium Female Block</li>
                      <li>24 rooms</li>
                    </ul></span>
                    <span class="bottom"> See Availability
                        <a href="#" onclick= 'showTable(4)'><img id="arrow" src="down_arrow.png"></a>
                    </span>
    
                </div>
            </section>
            <section id="tables">
                <table id="table1" >
                    <caption><h3>Abdi Hostel</h3></caption>
                    <thead>
                        <tr>
                        <th>Room</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Available Space(s)</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                          include('config.php');

                          // Query for Availability of Rooms in Abdi
                          $abdi_sql = "SELECT room.room_name, room.capacity, room.capacity - COUNT(DISTINCT booking.student_id) AS available_space, 
                                       CASE WHEN room.capacity = (room.capacity - COUNT(DISTINCT booking.student_id)) THEN 'Empty'
                                       WHEN (room.capacity - COUNT(DISTINCT booking.student_id)) = 0 THEN 'Full'
                                       ELSE 'Partially Occupied' END AS room_status
                                       FROM room
                                       LEFT JOIN booking ON room.room_id = booking.room_id
                                       AND booking.year_id = (SELECT year_id FROM academic_year WHERE a_year = '2022/2023')
                                          AND booking.term_id = (SELECT term_id FROM school_term WHERE term = 'Term Two')
                                       WHERE room.room_name LIKE 'a%'
                                       GROUP BY room.room_id";
                                      //  TODO: Order properly
                                  
                          $abdi_result = $conn->query($abdi_sql);

                          while($abdi_row = $abdi_result->fetch_assoc()){
                            echo "<tr>
                                  <td>$abdi_row[room_name]</td>
                                  <td>$abdi_row[capacity]</td>
                                  <td>$abdi_row[room_status]</td>
                                  <td>$abdi_row[available_space]</td>
                                  </tr>
                                  ";
                                }
                        ?>
                        
                      </tr> 
                    </tbody>
                    
                      
                </table>
                
                <!-- Table 2 -->
                <table id="table2" >
                    <caption><h3>Haligah Hostel</h3></caption>

                    <thead>
                        <tr>
                        <th>Room</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Available Space(s)</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                          include('config.php');

                          // Query for Availability of Rooms in Haligah
                          $haligah_sql = "SELECT room.room_name, room.capacity, room.capacity - COUNT(DISTINCT booking.student_id) AS available_space, 
                                       CASE WHEN room.capacity = (room.capacity - COUNT(DISTINCT booking.student_id)) THEN 'Empty'
                                       WHEN (room.capacity - COUNT(DISTINCT booking.student_id)) = 0 THEN 'Full'
                                       ELSE 'Partially Occupied' END AS room_status
                                       FROM room
                                       LEFT JOIN booking ON room.room_id = booking.room_id
                                       AND booking.year_id = (SELECT year_id FROM academic_year WHERE a_year = '2022/2023')
                                          AND booking.term_id = (SELECT term_id FROM school_term WHERE term = 'Term Two')
                                       WHERE room.room_name LIKE 'h%'
                                       GROUP BY room.room_id";
                                      //  TODO: Order properly
                                  
                          $haligah_result = $conn->query($haligah_sql);

                          while($haligah_row = $haligah_result->fetch_assoc()){
                            echo "<tr>
                                  <td>$haligah_row[room_name]</td>
                                  <td>$haligah_row[capacity]</td>
                                  <td>$haligah_row[room_status]</td>
                                  <td>$haligah_row[available_space]</td>
                                  </tr>
                                  ";
                                }
                        ?>
                    </tbody>
                    
                      
                </table>
                <!-- Table 3 -->
                <table id="table3">
                    <caption><h3>Niang Hostel</h3></caption>

                    <thead>
                        <tr>
                        <th>Room</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Available Space(s)</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                          include('config.php');

                          // Query for Availability of Rooms in Niang
                          $niang_sql = "SELECT room.room_name, room.capacity, room.capacity - COUNT(DISTINCT booking.student_id) AS available_space, 
                                       CASE WHEN room.capacity = (room.capacity - COUNT(DISTINCT booking.student_id)) THEN 'Empty'
                                       WHEN (room.capacity - COUNT(DISTINCT booking.student_id)) = 0 THEN 'Full'
                                       ELSE 'Partially Occupied' END AS room_status
                                       FROM room
                                       LEFT JOIN booking ON room.room_id = booking.room_id
                                       AND booking.year_id = (SELECT year_id FROM academic_year WHERE a_year = '2022/2023')
                                          AND booking.term_id = (SELECT term_id FROM school_term WHERE term = 'Term Two')
                                       WHERE room.room_name LIKE 'n%'
                                       GROUP BY room.room_id";
                                      //  TODO: Order properly
                                  
                          $niang_result = $conn->query($niang_sql);

                          while($niang_row = $niang_result->fetch_assoc()){
                            echo "<tr>
                                  <td>$niang_row[room_name]</td>
                                  <td>$niang_row[capacity]</td>
                                  <td>$niang_row[room_status]</td>
                                  <td>$niang_row[available_space]</td>
                                  </tr>
                                  ";
                                }
                        ?>
                    </tbody>
                    
                      
                </table>
                <!-- Table 4 -->
                <table id="table4">
                    <caption><h3>Maatalla Hostel</h3></caption>

                    <thead>
                        <tr>
                        <th>Room</th>
                        <th>Capacity</th>
                        <th>Status</th>
                        <th>Available Space(s)</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                        <?php

                          include('config.php');

                          // Query for Availability of Rooms in Maatalla
                          $maatalla_sql = "SELECT room.room_name, room.capacity, room.capacity - COUNT(DISTINCT booking.student_id) AS available_space, 
                                       CASE WHEN room.capacity = (room.capacity - COUNT(DISTINCT booking.student_id)) THEN 'Empty'
                                       WHEN (room.capacity - COUNT(DISTINCT booking.student_id)) = 0 THEN 'Full'
                                       ELSE 'Partially Occupied' END AS room_status
                                       FROM room
                                       LEFT JOIN booking ON room.room_id = booking.room_id
                                       AND booking.year_id = (SELECT year_id FROM academic_year WHERE a_year = '2022/2023')
                                          AND booking.term_id = (SELECT term_id FROM school_term WHERE term = 'Term Two')
                                       WHERE room.room_name LIKE 'm%'
                                       GROUP BY room.room_id";
                                      //  TODO: Order properly
                                  
                          $maatalla_result = $conn->query($maatalla_sql);

                          while($maatalla_row = $maatalla_result->fetch_assoc()){
                            echo "<tr>
                                  <td>$maatalla_row[room_name]</td>
                                  <td>$maatalla_row[capacity]</td>
                                  <td>$maatalla_row[room_status]</td>
                                  <td>$maatalla_row[available_space]</td>
                                  </tr>
                                  ";
                                }
                        ?>
                    </tbody>
                    
                      
                </table>
                
            </section>
          </div>
    
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

      document.getElementById("name").innerHTML = '<?php echo $_SESSION['Fname']?>'
      </script>
  </body>
</html>

  
    
    