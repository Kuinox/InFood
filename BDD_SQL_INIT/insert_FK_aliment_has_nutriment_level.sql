DROP PROCEDURE IF EXISTS insert_FK_aliment_has_nutriment_level;
DELIMITER //
CREATE PROCEDURE insert_FK_aliment_has_nutriment_level (IN id1 INT, IN id2 INT)
BEGIN
    SELECT aliment_id_aliment, nutriment_level_id_nutriment_level INTO result1,result2 FROM aliment_has_nutriment_level WHERE id1 = result1 AND id2 = result2;
	IF result1 IS NULL THEN
    	INSERT INTO aliment_has_nutriment_level VALUES(id1, id2);
    END IF;
END//
DELIMITER ;
