Use bayview_hostels;

-- queries for gender bar chart
SELECT COUNT(`user_id`)
FROM `hostel_user`
WHERE `user_gender`= "M" AND `user_role`=1;

SELECT COUNT(`user_id`)
FROM `hostel_user`
WHERE `user_gender`= "F" AND `user_role`=1;


-- queries for tiles on admin dashboard
-- registered students
SELECT COUNT(`user_id`)
FROM `hostel_user`
WHERE `user_role`=1;

-- available spaces
SELECT (SELECT SUM(`capacity`)
FROM `room`) -
(SELECT COALESCE(SUM(`booking_id`),0)
FROM `booking`
WHERE `status`="Yes");

-- total number of rooms
SELECT COUNT(`room_id`)
FROM `room`;