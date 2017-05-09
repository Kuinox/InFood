DROP PROCEDURE IF EXISTS insert_aliment;

CREATE PROCEDURE insert_aliment (IN id CHAR(30), IN name VARCHAR(250),
    IN last_modification INT, IN ingredients VARCHAR(5000),
    IN generic_name INT, IN grade_nutri CHAR(1), IN qty VARCHAR(30),
    IN serving VARCHAR(200), OUT return_id INT)
BEGIN
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
