DROP PROCEDURE IF EXISTS update_note;

CREATE PROCEDURE update_note (IN id CHAR(30), IN note TINYINT(4), IN id_user INT(11))
BEGIN
  DECLARE id_note INT;
  SELECT note
  INTO id_note
  FROM notes
  WHERE user_id_user = id_user;
IF id_note IS NULL
THEN
    INSERT INTO notes (aliment_id_aliment,note,user_id_user)
    VALUES(id,id_note,id_user);
ELSE
    UPDATE note SET
    note = id_note,
    date_note = NULL
    WHERE user_id_user = id_user;
END IF;
END;
