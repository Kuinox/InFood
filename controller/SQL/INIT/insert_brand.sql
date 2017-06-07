DROP PROCEDURE IF EXISTS insert_brand;

CREATE PROCEDURE insert_brand (IN code VARCHAR(41), IN val VARCHAR(300))
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM brand
    WHERE val = label;
    IF id_val IS NULL THEN
        INSERT INTO brand (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
    INSERT INTO aliment_has_brand (id, aliment_id_aliment, brand_id_brand)
    VALUES(NULL, code, id_val);
END;
