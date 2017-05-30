DROP PROCEDURE IF EXISTS insert_FK_aliment_has_keywords;

CREATE PROCEDURE insert_FK_aliment_has_keywords (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, keywords_id_keywords
    INTO @result1,@result2
    FROM aliment_has_keywords
    WHERE aliment_id_aliment = id1
    AND id2 = keywords_id_keywords;
    IF @result1 IS NULL THEN
        INSERT INTO aliment_has_keywords (id, aliment_id_aliment, keywords_id_keywords)
        VALUES(NULL, id1, id2);
    END IF;
END;
