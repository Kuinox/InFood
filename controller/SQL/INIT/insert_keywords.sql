DROP PROCEDURE IF EXISTS insert_keywords;

CREATE PROCEDURE insert_keywords (IN code CHAR(30), IN val VARCHAR(250))
BEGIN
    SELECT id
    INTO @id_val
    FROM keywords
    WHERE val = label;
	IF @id_val IS NULL THEN
    	INSERT INTO keywords (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO @id_val;
    END IF;
    CALL insert_FK_aliment_has_keywords(code, @id_val);
END;
