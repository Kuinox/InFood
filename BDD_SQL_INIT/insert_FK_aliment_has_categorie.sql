DROP PROCEDURE IF EXISTS insert_FK_aliment_has_categorie;

CREATE PROCEDURE insert_FK_aliment_has_categorie (IN id1 INT, IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, categorie_id_categorie INTO @result1,@result2 FROM aliment_has_categorie WHERE id1 = @result1 AND id2 = @result2;
	IF @result1 IS NULL THEN
    	INSERT INTO aliment_has_categorie VALUES(NULL, id1, id2);
    END IF;
END;
