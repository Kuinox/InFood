DROP PROCEDURE IF EXISTS insert_FK_aliment_has_allergen;

CREATE PROCEDURE insert_FK_aliment_has_allergen (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, allergen_id_allergen
    INTO @result1,@result2
    FROM aliment_has_allergen
    WHERE aliment_id_aliment = id1
    AND id2 = allergen_id_allergen;
	IF @result1 IS NULL THEN
    	INSERT INTO aliment_has_allergen (id, aliment_id_aliment, allergen_id_allergen)
        VALUES(NULL, id1, id2);
    END IF;
END;
