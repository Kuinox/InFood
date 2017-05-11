DROP PROCEDURE IF EXISTS insert_additive;

CREATE PROCEDURE insert_additive (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id
    INTO id_val
    FROM additive
    WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO additive (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END;