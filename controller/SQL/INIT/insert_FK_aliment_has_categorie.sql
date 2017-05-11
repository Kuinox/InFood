DROP PROCEDURE IF EXISTS insert_FK_aliment_has_categorie;

CREATE PROCEDURE insert_FK_aliment_has_categorie (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, categorie_id_categorie
    INTO @result1,@result2
    FROM aliment_has_categorie
    WHERE aliment_id_aliment = id1
    AND id2 = categorie_id_categorie;
	IF @result1 IS NULL THEN
    	INSERT INTO aliment_has_categorie (id, aliment_id_aliment, categorie_id_categorie)
        VALUES(NULL, id1, id2);
    END IF;
END;
