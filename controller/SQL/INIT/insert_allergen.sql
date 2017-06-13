DROP PROCEDURE IF EXISTS insert_allergen;

CREATE PROCEDURE insert_allergen (IN code VARCHAR(41), IN val VARCHAR(1000))
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM allergens
    WHERE val = label;
    IF id_val IS NULL THEN
        INSERT INTO allergens (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
    INSERT INTO aliment_has_allergens (id, aliment_id_aliment, allergens_id)
    VALUES(NULL, code, id_val);
END;
