-- donation request
-- query checking for record, elapse time
Select * from donation_requests where date_add(created, interval 6 month) < now();
select created, date_add(created, interval 6 month) from donation_requests;

-- event codes for donation_requests cleaner
DELIMITER $$

SET GLOBAL event_scheduler = ON$$     -- required for event to execute but not create

CREATE	/*[DEFINER = { user | CURRENT_USER }]*/	EVENT `aboundinginlove`.`donation_request_cleaner`

ON SCHEDULE
	 /* uncomment the example below you want to use */

	-- scheduleexample 1: run once

	   --  AT 'YYYY-MM-DD HH:MM.SS'/CURRENT_TIMESTAMP { + INTERVAL 1 [HOUR|MONTH|WEEK|DAY|MINUTE|...] }

	-- scheduleexample 2: run at intervals forever after creation

	   EVERY 1 DAY

	-- scheduleexample 3: specified start time, end time and interval for execution
	   /*EVERY 1  [HOUR|MONTH|WEEK|DAY|MINUTE|...]

	   STARTS CURRENT_TIMESTAMP/'YYYY-MM-DD HH:MM.SS' { + INTERVAL 1[HOUR|MONTH|WEEK|DAY|MINUTE|...] }

	   ENDS CURRENT_TIMESTAMP/'YYYY-MM-DD HH:MM.SS' { + INTERVAL 1 [HOUR|MONTH|WEEK|DAY|MINUTE|...] } */

/*[ON COMPLETION [NOT] PRESERVE]
[ENABLE | DISABLE]
[COMMENT 'comment']*/

DO
	BEGIN
	    Delete from donation_requests where date_add(created, interval 6 month) < now();
	END$$

DELIMITER ;






--Pending Donation
--cleaning pending donation record not more than 6 months from created date
Select * from sponsee_donations sd
inner join sponsee_donation_items sdi
where sd.id = sdi.parent_id and date_add(created, interval 6 month) < now();

select created, date_add(created, interval 6 month) from sponsee_donations;


-- event codes for pending donations cleaner
ELIMITER $$

SET GLOBAL event_scheduler = ON$$     -- required for event to execute but not create

CREATE	/*[DEFINER = { user | CURRENT_USER }]*/	EVENT `aboundinginlove`.`pending_donation_cleaner`

ON SCHEDULE
	 /* uncomment the example below you want to use */

	-- scheduleexample 1: run once

	   --  AT 'YYYY-MM-DD HH:MM.SS'/CURRENT_TIMESTAMP { + INTERVAL 1 [HOUR|MONTH|WEEK|DAY|MINUTE|...] }

	-- scheduleexample 2: run at intervals forever after creation

	   EVERY 1 DAY

	-- scheduleexample 3: specified start time, end time and interval for execution
	   /*EVERY 1  [HOUR|MONTH|WEEK|DAY|MINUTE|...]

	   STARTS CURRENT_TIMESTAMP/'YYYY-MM-DD HH:MM.SS' { + INTERVAL 1[HOUR|MONTH|WEEK|DAY|MINUTE|...] }

	   ENDS CURRENT_TIMESTAMP/'YYYY-MM-DD HH:MM.SS' { + INTERVAL 1 [HOUR|MONTH|WEEK|DAY|MINUTE|...] } */

/*[ON COMPLETION [NOT] PRESERVE]
[ENABLE | DISABLE]
[COMMENT 'comment']*/

DO
	BEGIN
		DELETE sponsee_donations, sponsee_donation_items
		FROM sponsee_donations
		LEFT JOIN sponsee_donation_items
		ON sponsee_donations.id = sponsee_donation_items.parent_id
		WHERE  date_add(created, interval 6 month) < now();
	END$$

DELIMITER ;