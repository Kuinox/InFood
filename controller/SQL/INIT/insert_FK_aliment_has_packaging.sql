DROP PROCEDURE IF EXISTS insert_FK_aliment_has_packaging;

CREATE PROCEDURE insert_FK_aliment_has_packaging (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, packaging_id_packaging
    INTO @result1,@result2
    FROM aliment_has_packaging
    WHERE aliment_id_aliment = id1
    AND id2 =packaging_id_packaging;
    IF @result1 IS NULL THEN
        INSERT INTO aliment_has_packaging (id, aliment_id_aliment, packaging_id_packaging)
        VALUES(NULL, id1, id2);
    END IF;
END;
