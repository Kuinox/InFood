DROP PROCEDURE IF EXISTS insert_aliment;

CREATE PROCEDURE insert_aliment (IN id VARCHAR(41), IN name VARCHAR(250),
    IN last_modification INT, IN ingredients VARCHAR(5000),
    IN generic_name_char VARCHAR(500), IN grade_nutri CHAR(1), IN qty VARCHAR(1000),
    IN serving VARCHAR(1000))
BEGIN
    DECLARE generic_name INT;
    IF generic_name_char IS NOT NULL THEN
        CALL insert_generic_name(generic_name_char, generic_name);
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
            id,
            name,
            FROM_UNIXTIME(last_modification),
            ingredients,
            generic_name,
            grade_nutri,
            qty,
            serving);
END;
