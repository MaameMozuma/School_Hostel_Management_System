USE bayview_hostels;

SELECT `fname`, `lname`, `cleaning_area`, `no_of_rooms`, `tel_no`
FROM `cleaner` 
JOIN `cleaner_schedule` 
ON cleaner.worker_id = cleaner_schedule.cleaner_id;
