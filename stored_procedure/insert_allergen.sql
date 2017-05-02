DROP PROCEDURE IF EXISTS insert_allergen;
DELIMITER //
CREATE PROCEDURE insert_allergen (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM allergen WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO allergen VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END//
DELIMITER ;
