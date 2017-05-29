DROP PROCEDURE IF EXISTS insert_FK_aliment_has_brand;

CREATE PROCEDURE insert_FK_aliment_has_brand (IN id1 char(30), IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, brand_id_brand
    INTO @result1,@result2
    FROM aliment_has_brand
    WHERE aliment_id_aliment = id1
    AND brand_id_brand = id2;
    IF @result1 IS NULL THEN
        INSERT INTO aliment_has_brand (id, aliment_id_aliment, brand_id_brand)
        VALUES(NULL, id1, id2);
    END IF;
END;
