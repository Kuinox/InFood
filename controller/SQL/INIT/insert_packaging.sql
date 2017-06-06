DROP PROCEDURE IF EXISTS insert_packaging;

CREATE PROCEDURE insert_packaging (IN code VARCHAR(41), IN val VARCHAR(250))
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM packaging
    WHERE val = label;
    IF id_val IS NULL THEN
        INSERT INTO packaging (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
    INSERT INTO aliment_has_packaging (id, aliment_id_aliment, packaging_id_packaging)
    VALUES(NULL, code, id_val);
END;
