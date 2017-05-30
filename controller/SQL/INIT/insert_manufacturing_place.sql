DROP PROCEDURE IF EXISTS insert_manufacturing_place;

CREATE PROCEDURE insert_manufacturing_place (IN code CHAR(30), IN val VARCHAR(250))
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM manufacturing_place
    WHERE val = label;
    IF id_val IS NULL THEN
        INSERT INTO manufacturing_place (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
    INSERT INTO aliment_has_manufacturing_place (id, aliment_id_aliment, manufacturing_place_id_manufacturing_place)
    VALUES(NULL, code, id_val);
END;
