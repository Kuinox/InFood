DROP PROCEDURE IF EXISTS insert_categorie;
DELIMITER //
CREATE PROCEDURE insert_categorie (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM categorie WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO categorie VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END//
DELIMITER ;
