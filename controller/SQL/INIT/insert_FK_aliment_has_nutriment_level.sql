DROP PROCEDURE IF EXISTS insert_FK_aliment_has_nutriment_level;

CREATE PROCEDURE insert_FK_aliment_has_nutriment_level (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, nutriment_level_id_nutriment_level
    INTO @result1,@result2
    FROM aliment_has_nutriment_level
    WHERE aliment_id_aliment = id1
    AND id2 = nutriment_level_id_nutriment_levelss;
	IF @result1 IS NULL THEN
    	INSERT INTO aliment_has_nutriment_level (id, aliment_id_aliment, nutriment_level_id_nutriment_level)
        VALUES(NULL, id1, id2);
    END IF;
END;
