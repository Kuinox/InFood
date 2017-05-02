DROP PROCEDURE IF EXISTS insert_nutriment_level;
DELIMITER //
CREATE PROCEDURE insert_nutriment_level (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM nutriment_level WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO nutriment_level VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END//
DELIMITER ;
