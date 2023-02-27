USE bayview_hostels;

-- available rooms in Abdi hostel
SELECT `room_name` as 'Room', `capacity` as 'Capacity', `capacity` - COUNT(DISTINCT(booking.student_id)) as "Available space(s)", 
CASE WHEN `capacity` = `capacity`-COUNT(booking_id) THEN 'Empty'
            WHEN `capacity`-COUNT(booking_id) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS `Room status`
FROM room
LEFT JOIN booking
ON room.room_id = booking.room_id
WHERE `room_name` LIKE 'a%'
GROUP BY room.room_id;


-- available rooms in Maatalla hostel
SELECT `room_name` as 'Room', `capacity` as 'Capacity', `capacity` - COUNT(DISTINCT(booking.student_id)) as "Available space(s)", 
CASE WHEN `capacity` = `capacity`-COUNT(booking_id) THEN 'Empty'
            WHEN `capacity`-COUNT(booking_id) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS `Room status`
FROM room
LEFT JOIN booking
ON room.room_id = booking.room_id
WHERE `room_name` LIKE 'm%'
GROUP BY room.room_id;


-- available rooms in Haligah hostel
SELECT `room_name` as 'Room', `capacity` as 'Capacity', `capacity` - COUNT(DISTINCT(booking.student_id)) as "Available space(s)", 
CASE WHEN `capacity` = `capacity`-COUNT(booking_id) THEN 'Empty'
            WHEN `capacity`-COUNT(booking_id) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS `Room status`
FROM room
LEFT JOIN booking
ON room.room_id = booking.room_id
WHERE `room_name` LIKE 'h%'
GROUP BY room.room_id;


-- available rooms in Niang hostel
SELECT `room_name` as 'Room', `capacity` as 'Capacity', `capacity` - COUNT(DISTINCT(booking.student_id)) as "Available space(s)", 
CASE WHEN `capacity` = `capacity`-COUNT(booking_id) THEN 'Empty'
            WHEN `capacity`-COUNT(booking_id) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS `Room status`
FROM room
LEFT JOIN booking
ON room.room_id = booking.room_id
WHERE `room_name` LIKE 'n%'
GROUP BY room.room_id;



-- Trying to update the queries as much as possible

USE bayview_hostels;

-- available rooms in Abdi hostel
SELECT `room_name` as 'Room', `capacity` as 'Capacity', 
`capacity` - (SELECT COUNT(DISTINCT(booking.student_id)) FROM booking WHERE year_id IN (SELECT academic_year.year_id FROM academic_year WHERE a_year = "2022/2023")
AND term_id IN (SELECT school_term.term_id FROM school_term WHERE term = "Term Two") AND booking.status = "Yes") as "Available space(s)", 
CASE WHEN `capacity` = `capacity`-COUNT(booking_id) THEN 'Empty'
            WHEN `capacity`- COUNT(booking_id) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS `Room status`
FROM room
LEFT JOIN booking
ON room.room_id = booking.room_id
WHERE `room_name` LIKE 'a%' 
GROUP BY room.room_id;