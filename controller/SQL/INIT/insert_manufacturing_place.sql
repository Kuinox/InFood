DROP PROCEDURE IF EXISTS insert_manufacturing_place;

CREATE PROCEDURE insert_manufacturing_place (IN code CHAR(30), IN val VARCHAR(250), IN foreign_key INT)
BEGIN
    SELECT id
    INTO @id_val
    FROM manufacturing_place
    WHERE val = label;
	IF @id_val IS NULL THEN
    	INSERT INTO manufacturing_place (id, label, mother_place)
        VALUES(NULL, val, foreign_key);
        SELECT LAST_INSERT_ID() INTO @id_val;
    END IF;
    CALL insert_FK_aliment_has_manufacturing_place(code, @id_val);
END;
