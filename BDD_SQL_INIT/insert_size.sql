DROP PROCEDURE IF EXISTS insert_size;

CREATE PROCEDURE insert_size (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM size WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO size VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END;
