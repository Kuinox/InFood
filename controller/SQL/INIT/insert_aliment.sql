DROP PROCEDURE IF EXISTS insert_aliment;

CREATE PROCEDURE insert_aliment (IN codebar VARCHAR(41), IN name VARCHAR(250),
    IN last_modification INT, IN ingredients VARCHAR(5000),
    IN generic_name_char VARCHAR(500), IN grade_nutri CHAR(1), IN qty VARCHAR(1000),
    IN serving VARCHAR(1000))
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM generic_name
    WHERE generic_name_char = label;
    IF generic_name_char IS NOT NULL THEN
        IF id_val IS NULL THEN
            INSERT INTO generic_name (id, label)
            VALUES(NULL, generic_name_char);
            SELECT LAST_INSERT_ID() INTO id_val;
        END IF;
    END IF;
    INSERT INTO aliment (
            id_aliment,
            name_aliment,
            last_modification_aliment,
            ingredients_aliment,
            generic_name_id,
            grade_nutriment,
            quantity,
            serving_size)
        VALUES (
            codebar,
            name,
            FROM_UNIXTIME(last_modification),
            ingredients,
            id_val,
            grade_nutri,
            qty,
            serving);
END;
