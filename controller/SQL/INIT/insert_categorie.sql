DROP PROCEDURE IF EXISTS insert_categorie;

CREATE PROCEDURE insert_categorie (IN code CHAR(30), IN val VARCHAR(250))
BEGIN
    SELECT id
    INTO @id_val
    FROM categorie
    WHERE val = label;
	IF @id_val IS NULL THEN
    	INSERT INTO categorie (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO @id_val;
    END IF;
    CALL insert_FK_aliment_has_categorie(code, @id_val);
END;
