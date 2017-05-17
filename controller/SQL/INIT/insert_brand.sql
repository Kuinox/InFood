DROP PROCEDURE IF EXISTS insert_brand;

CREATE PROCEDURE insert_brand (IN code CHAR(30), IN val VARCHAR(250))
BEGIN
    SELECT id
    INTO @id_val
    FROM brand
    WHERE val = label;
	IF @id_val IS NULL THEN
    	INSERT INTO brand (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO @id_val;
    END IF;
    CALL insert_FK_aliment_has_brand(code, @id_val);
END;
