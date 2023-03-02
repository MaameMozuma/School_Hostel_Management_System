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
        <title>Bayview Hostels</title>
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="admin_index.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
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
            <h2>Welcome, <span id="head">Admin!</span></h2>
            
            <section class="boxes">
                <div class="row">
                    <div class="box" id="box1">
                        <p class="box_text">Registered Students</p>
                        <p class="number" id="registered_students">20</p>
                    </div>
                    <div class="box" id="box2">
                        <p class="box_text">Available Spaces</p>
                        <p class="number" id="available_spaces">5</p>
                    </div>
                    <div class="box" id="box3">
                        <p class="box_text">Total Number of Rooms</p>
                        <p class="number" id="number_of_rooms">30</p>
                    </div>
                </div>
                <div id="chart_space"><canvas id="barChart"></canvas></div> 
            </section>
        </div>
        
         <!-- Database Retrieval for chart -->
         <?php
            include('config.php');
            
            // Registered students query
            $sql1 = "SELECT COUNT(user_id) AS Reg_Stud_Result 
                     FROM hostel_user 
                     WHERE user_role=1";
            
            $reg_stud_sql = $conn->query($sql1);
            $row1 = $reg_stud_sql->fetch_assoc();
            $reg_stud = "$row1[Reg_Stud_Result]";

            // Available Spaces query
            $sql2 = "SELECT (SELECT SUM(capacity)
                     FROM room) -
                     (SELECT COALESCE(SUM(booking_id),0)
                     FROM booking
                     WHERE 'status'='Yes')
                     AS Available_Spaces_Result";

            $spaces_sql = $conn->query($sql2);
            $row2 = $spaces_sql->fetch_assoc();
            $available_spaces = "$row2[Available_Spaces_Result]";

            // Number of rooms query
            $sql3 = "SELECT COUNT(room_id) 
                     AS No_Rooms
                     FROM room";

            $no_rooms_sql = $conn->query($sql3);
            $row3 = $no_rooms_sql->fetch_assoc();
            $no_rooms = "$row3[No_Rooms]";



            // Gender queries
            // Male
            $sql4 = "SELECT COUNT(`user_id`)
                     AS 'Male'
                     FROM `hostel_user`
                     WHERE `user_gender`= 'M' AND `user_role`=1";
            $no_male_sql = $conn->query($sql4);
            $row4 = $no_male_sql->fetch_assoc();
            $no_male = "$row4[Male]";


            // Female
            $sql5 = "SELECT COUNT(`user_id`)
                     AS 'Female'
                     FROM `hostel_user`
                     WHERE `user_gender`= 'F' AND `user_role`=1";
            $no_female_sql = $conn->query($sql5);
            $row5 = $no_female_sql->fetch_assoc();
            $no_female = "$row5[Female]";


        ?>
        <script type="text/javascript">
            // Set figures based on database
            document.getElementById("registered_students").innerHTML = '<?php echo "$reg_stud"; ?>'
            document.getElementById("available_spaces").innerHTML = '<?php echo "$available_spaces"; ?>'
            document.getElementById("number_of_rooms").innerHTML = '<?php echo "$no_rooms"; ?>'
            document.getElementById("name").innerHTML = '<?php echo $_SESSION['Fname']?>'
            document.getElementById("head").innerHTML = '<?php echo $_SESSION['Fname']?>'
            var male = '<?php echo "$no_male"; ?>'
            var female = '<?php echo "$no_female"; ?>'

        </script>
        
        

        <script>
            //bar
            var bar = document.getElementById("barChart").getContext('2d');
            var myBarChart = new Chart(bar, {
              type: 'bar',
              data: {
                labels: [ "Female", "Male"],
                datasets: [{
                  label: 'Gender %',
                  data: [female, male],
                  backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                  ],
                  borderColor: [
                    '#0A2239',
                    '#132E32',
                  ],
                  borderWidth: 1
                }]
              },
              options: {
                scales: {
                  yAxes: [{
                    ticks: {
                      beginAtZero: true
                    }
                  }]
                }
              }
            });

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