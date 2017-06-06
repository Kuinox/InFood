DROP PROCEDURE IF EXISTS update_aliment;

CREATE PROCEDURE update_aliment (IN id VARCHAR(41), IN name VARCHAR(250),
    IN last_modification INT, IN ingredients VARCHAR(5000),
    IN generic_name INT, IN grade_nutri CHAR(1), IN qty VARCHAR(30),
    IN serving VARCHAR(200))
BEGIN
    DELETE FROM aliment_has_ingredient
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_nutriment
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_additive
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_brand
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_packaging
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_manufacturing_place
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_keywords
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_allergen
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_pic_name
    WHERE aliment_id_aliment = id;
    DELETE FROM aliment_has_categorie
    WHERE aliment_id_aliment = id;
    UPDATE  aliment SET
            name_aliment = name,
            last_modification_aliment = FROM_UNIXTIME(last_modification),
            ingredients_aliment = ingredients,
            generic_name_id = generic_name,
            grade_nutriment = grade_nutri,
            quantity = qty,
            serving_size = serving
    WHERE id_aliment = id;
END;
