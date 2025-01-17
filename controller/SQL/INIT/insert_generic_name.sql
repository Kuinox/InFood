DROP PROCEDURE IF EXISTS insert_generic_name;

CREATE PROCEDURE insert_generic_name (IN val VARCHAR(250), OUT id_val INT)
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM generic_name
    WHERE val = label;
    IF id_val IS NULL THEN
        INSERT INTO generic_name (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
END;
