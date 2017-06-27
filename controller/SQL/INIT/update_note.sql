DROP PROCEDURE IF EXISTS update_note;

CREATE PROCEDURE update_note (IN id_aliment CHAR(30), IN p_note INT(4), IN id_user INT(11))
BEGIN
  DECLARE id_note INT;
  SELECT note
  INTO id_note
  FROM notes
  WHERE user_id_user = id_user AND aliment_id_aliment LIKE id_aliment;
IF id_note IS NULL
THEN
    INSERT INTO notes (aliment_id_aliment,note,user_id_user)
    VALUES(id_aliment,p_note,id_user);
ELSE
    UPDATE notes SET
    note = p_note
    WHERE aliment_id_aliment LIKE id_aliment AND user_id_user = id_user;
END IF;
END;
