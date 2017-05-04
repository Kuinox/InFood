USE infood;
INSERT INTO user (id_user,pseudo,password,email,height,weight)
values
(NULL,'toto','toto','toto@gmail.com','175','70'),
(NULL,'titi','titi','titi@gmail.com','185','80'),
(NULL,'jean','jean','jean@gmail.com','165','65'),
(NULL,'paul','paul','paul@gmail.com','155','65'),
(NULL,'steve','steve','steve@gmail.com','178','75'),
(NULL,'nicolas','nicolas','nicolas@gmail.com','175','80'),
(NULL,'tom','tom','tom@gmail.com','145','39'),
(NULL,'michel','michel','michel@gmail.com','165','65'),
(NULL,'pierre','pierre','pierre@gmail.com','185','65'),
(NULL,'jaques','jaques','jaques@gmail.com','155','65');
INSERT INTO grade (id_grade,name_grade)
values
(2,'utilisateur'),
(1,'admin');
INSERT INTO grade_user (user_id_user,grade_id_grade)
values
(1,2),
(2,2),
(3,2),
(4,2),
(5,2),
(6,1),
(7,2),
(8,2),
(9,2),
(10,2);


-- attendre la majj de la datab
--insert into unwanted_aliment (aliment_id_aliment,user_id_user)
--values
--(5,'toto'),
--(3,'pierre'),
--(2,'jaques');
