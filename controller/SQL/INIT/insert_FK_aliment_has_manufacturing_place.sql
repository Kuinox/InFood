DROP PROCEDURE IF EXISTS insert_FK_aliment_has_manufacturing_place;

CREATE PROCEDURE insert_FK_aliment_has_manufacturing_place (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, manufacturing_place_id_manufacturing_place
    INTO @result1,@result2
    FROM aliment_has_manufacturing_place
    WHERE aliment_id_aliment = id1
    AND id2 = manufacturing_place_id_manufacturing_place;
    IF @result1 IS NULL THEN
        INSERT INTO aliment_has_manufacturing_place (id, aliment_id_aliment, manufacturing_place_id_manufacturing_place)
        VALUES(NULL, id1, id2);
    END IF;
END;
