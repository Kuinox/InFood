DROP PROCEDURE IF EXISTS insert_categorie;

CREATE PROCEDURE insert_categorie (IN code VARCHAR(41), IN val VARCHAR(250))
BEGIN
    DECLARE id_val INT;
    SELECT id
    INTO id_val
    FROM categorie
    WHERE val = label;
    IF id_val IS NULL THEN
        INSERT INTO categorie (id, label)
        VALUES(NULL, val);
        SELECT LAST_INSERT_ID() INTO id_val;
    END IF;
    INSERT INTO aliment_has_categorie (id, aliment_id_aliment, categorie_id_categorie)
    VALUES(NULL, code, id_val);
END;
