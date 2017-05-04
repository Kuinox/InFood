DROP PROCEDURE IF EXISTS insert_FK_aliment_has_keywords;

CREATE PROCEDURE insert_FK_aliment_has_keywords (IN id1 INT, IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, keywords_id_keywords INTO @result1,@result2 FROM aliment_has_keywords WHERE id1 = @result1 AND id2 = @result2;
	IF @result1 IS NULL THEN
    	INSERT INTO aliment_has_keywords VALUES(id1, id2);
    END IF;
END;
