DROP PROCEDURE IF EXISTS insert_FK_aliment_has_additive;

CREATE PROCEDURE insert_FK_aliment_has_additive (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, additive_id_additive
    INTO @result1,@result2
    FROM aliment_has_additive
    WHERE aliment_id_aliment = id1
    AND additive_id_additive = id2;
    IF @result1 IS NULL THEN
    INSERT INTO aliment_has_additive (id, aliment_id_aliment, additive_id_additive)
    VALUES(NULL, id1, id2);
    END IF;
END;
