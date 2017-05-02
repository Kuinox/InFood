DROP PROCEDURE IF EXISTS multi_insert;
DELIMITER //
CREATE PROCEDURE multi_insert (IN id_ingredient INT, label_ingredient VARCHAR(45), IN id_nutriment INT,
    label_nutriment VARCHAR(45), IN id_nutriment_level INT, IN label_nutriment_level VARCHAR(45), IN id_additive INT,
    IN label_additive VARCHAR(10), IN id_brand INT, IN label_brand VARCHAR(100), IN id_packaging INT,
    IN label_packaging VARCHAR(50), IN id_manufacturing_place INT, IN label_manufacturing_place VARCHAR(45),
    IN FK_manufacturing_place INT, IN id_keywords INT, IN label_keywords VARCHAR(45), IN id_allergen INT,
    IN label_allergen VARCHAR(25), IN id_categorie INT, IN label_categorie VARCHAR(45), IN id_generic_name INT,
    IN label_generic_name VARCHAR(250))
BEGIN
    
END//
DELIMITER ;
