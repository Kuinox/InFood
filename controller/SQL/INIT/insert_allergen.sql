DROP PROCEDURE IF EXISTS insert_allergen;

CREATE PROCEDURE insert_allergen (IN code VARCHAR(41), IN val VARCHAR(1000))
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM allergen
    WHERE val = label;
    IF id_val IS NULL THEN
        INSERT INTO allergen (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
    INSERT INTO aliment_has_allergen (id, aliment_id_aliment, allergen_id_allergen)
    VALUES(NULL, code, id_val);
END;
