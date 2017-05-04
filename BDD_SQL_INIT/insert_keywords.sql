DROP PROCEDURE IF EXISTS insert_keywords;

CREATE PROCEDURE insert_keywords (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM keywords WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO keywords VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END;
