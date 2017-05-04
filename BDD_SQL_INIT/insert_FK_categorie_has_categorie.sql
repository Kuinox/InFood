DROP PROCEDURE IF EXISTS insert_FK_categorie_has_categorie;

CREATE PROCEDURE insert_FK_categorie_has_categorie (IN id1 INT, IN id2 INT)
BEGIN
    SELECT categorie_id_categorie, sub_id_categorie INTO @result1,@result2 FROM categorie_has_categorie WHERE id1 = @result1 AND id2 = @result2;
	IF @result1 IS NULL THEN
    	INSERT INTO categorie_has_categorie VALUES(id1, id2);
    END IF;
END;
