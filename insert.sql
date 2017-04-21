USE infood;
INSERT INTO user (id_user,password,email,height,weight)
values
('toto','toto','toto@gmail.com','175','70'),
('titi','titi','titi@gmail.com','185','80'),
('jean','jean','jean@gmail.com','165','65'),
('paul','paul','paul@gmail.com','155','65'),
('steve','steve','steve@gmail.com','178','75'),
('nicolas','nicolas','nicolas@gmail.com','175','80'),
('tom','tom','tom@gmail.com','145','39'),
('michel','michel','michel@gmail.com','165','65'),
('pierre','pierre','pierre@gmail.com','185','65'),
('jaques','jaques','jaques@gmail.com','155','65');
INSERT INTO grade (id_grade,name_grade)
values
(0,'utilisateur'),
(1,'admin');
INSERT INTO grade_user (user_id_user,grade_id_grade)
values
('toto',0),
('titi',0),
('jean',0),
('paul',0),
('steve',0),
('nicolas',1),
('tom',0),
('michel',0),
('pierre',0),
('jaques',0);

INSERT INTO grade_nutriment (tag_grade_nutriment)
VALUES ('A'),('B'),('C'),('D'),('E'),('F');
