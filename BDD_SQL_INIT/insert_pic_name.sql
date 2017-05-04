DROP PROCEDURE IF EXISTS insert_pic_name;

CREATE PROCEDURE insert_pic_name (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    SELECT id INTO id_val FROM pic_name WHERE val = label;
	IF id_val IS NULL THEN
    	INSERT INTO pic_name VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END;
