DROP PROCEDURE IF EXISTS insert_additive;

CREATE PROCEDURE insert_additive (IN code CHAR(30), IN val VARCHAR(250))
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM additive
    WHERE label = val;
	IF id_val IS NULL THEN
    	INSERT INTO additive (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
    INSERT INTO aliment_has_additive (id, aliment_id_aliment, additive_id_additive)
    VALUES(NULL, code, id_val);
END;
