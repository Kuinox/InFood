DROP PROCEDURE IF EXISTS insert_brand;
DELIMITER //
CREATE PROCEDURE insert_brand (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM brand WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO brand VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END//
DELIMITER ;
