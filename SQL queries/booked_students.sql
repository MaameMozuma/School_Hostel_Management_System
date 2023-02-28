USE bayview_hostels;

SELECT CONCAT(`first_name`, ' ', `last_name`) 'Name', `user_email` 'Email', `user_tel` 'Phone Number', `room_name` 'Room', `block_name` 'Hostel'
FROM
((booking INNER JOIN hostel_user ON booking.student_id = hostel_user.user_id) INNER JOIN room on booking.room_id = room.room_id) INNER JOIN block on room.block_id = block.block_id
WHERE year_id IN (SELECT academic_year.year_id FROM academic_year WHERE a_year = "2022/2023")
AND term_id IN (SELECT school_term.term_id FROM school_term WHERE term = "Term Two")
