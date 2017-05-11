DROP PROCEDURE IF EXISTS insert_FK_aliment_has_ingredient;

CREATE PROCEDURE insert_FK_aliment_has_ingredient (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, ingredient_id_ingredient
    INTO @result1,@result2
    FROM aliment_has_ingredient
    WHERE aliment_id_aliment = id1
    AND id2 = ingredient_id_ingredient;
	IF @result1 IS NULL THEN
    	INSERT INTO aliment_has_ingredient (id, aliment_id_aliment, ingredient_id_ingredient)
        VALUES(NULL, id1, id2);
    END IF;
END;
