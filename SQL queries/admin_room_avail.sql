USE bayview_hostels;

-- queries being filtered for a specific semester (term and academic year)
-- available rooms in Abdi hostel
SELECT room.room_name, room.capacity, room.capacity - COUNT(DISTINCT booking.student_id) AS available_space, 
CASE WHEN room.capacity = (room.capacity - COUNT(DISTINCT booking.student_id)) THEN 'Empty'
            WHEN (room.capacity - COUNT(DISTINCT booking.student_id)) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS room_status
FROM room
LEFT JOIN booking ON room.room_id = booking.room_id
                AND booking.year_id = (SELECT year_id FROM academic_year WHERE a_year = '2022/2023')
                AND booking.term_id = (SELECT term_id FROM school_term WHERE term = 'Term Two')
WHERE room.room_name LIKE 'a%'
GROUP BY room.room_id;



-- available rooms in Maatalla hostel
SELECT room.room_name, room.capacity, room.capacity - COUNT(DISTINCT booking.student_id) AS available_space, 
CASE WHEN room.capacity = (room.capacity - COUNT(DISTINCT booking.student_id)) THEN 'Empty'
            WHEN (room.capacity - COUNT(DISTINCT booking.student_id)) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS room_status
FROM room
LEFT JOIN booking ON room.room_id = booking.room_id
                AND booking.year_id = (SELECT year_id FROM academic_year WHERE a_year = '2022/2023')
                AND booking.term_id = (SELECT term_id FROM school_term WHERE term = 'Term Two')
WHERE room.room_name LIKE 'm%'
GROUP BY room.room_id;



-- available rooms in Haligah hostel
SELECT room.room_name, room.capacity, room.capacity - COUNT(DISTINCT booking.student_id) AS available_space, 
CASE WHEN room.capacity = (room.capacity - COUNT(DISTINCT booking.student_id)) THEN 'Empty'
            WHEN (room.capacity - COUNT(DISTINCT booking.student_id)) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS room_status
FROM room
LEFT JOIN booking ON room.room_id = booking.room_id
                AND booking.year_id = (SELECT year_id FROM academic_year WHERE a_year = '2022/2023')
                AND booking.term_id = (SELECT term_id FROM school_term WHERE term = 'Term Two')
WHERE room.room_name LIKE 'h%'
GROUP BY room.room_id;



-- available rooms in Niang hostel
SELECT room.room_name, room.capacity, room.capacity - COUNT(DISTINCT booking.student_id) AS available_space, 
CASE WHEN room.capacity = (room.capacity - COUNT(DISTINCT booking.student_id)) THEN 'Empty'
            WHEN (room.capacity - COUNT(DISTINCT booking.student_id)) = 0 THEN 'Full'
            ELSE 'Partially Occupied' END AS room_status
FROM room
LEFT JOIN booking ON room.room_id = booking.room_id
                AND booking.year_id = (SELECT year_id FROM academic_year WHERE a_year = '2022/2023')
                AND booking.term_id = (SELECT term_id FROM school_term WHERE term = 'Term Two')
WHERE room.room_name LIKE 'n%'
GROUP BY room.room_id;
