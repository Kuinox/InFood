DROP PROCEDURE IF EXISTS insert_packaging;

CREATE PROCEDURE insert_packaging (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM packaging WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO packaging VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END;
