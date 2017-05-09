DROP PROCEDURE IF EXISTS insert_FK_aliment_has_nutriment;

CREATE PROCEDURE insert_FK_aliment_has_nutriment (IN id1 INT, IN id2 INT, IN quantity INT)
BEGIN
    SELECT aliment_id_aliment, nutriment_id_nutriment, nutriment_quantity INTO @result1,@result2,@qty
        FROM aliment_has_nutriment WHERE id1 = @result1 AND id2 = @result2;
	IF @result1 IS NULL THEN
    	INSERT INTO aliment_has_nutriment VALUES(NULL, id1, id2, quantity);
    ELSEIF quantity != @qty THEN
        UPDATE aliment_has_nutriment SET nutriment_quantity=quantity;
    END IF;
END;
