DROP PROCEDURE IF EXISTS insert_nutriment;
DELIMITER //
CREATE PROCEDURE insert_nutriment (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM nutriment WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO nutriment VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END//
DELIMITER ;
