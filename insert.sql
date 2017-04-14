use infood;
insert into user (id_user,password,email,height,weight)
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
insert into grade (id_grade,name_grade)
values
(0,'utilisateur'),
(1,'admin');
insert into grade_user (user_id_user,grade_id_grade)
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
/* attendre la majj de la datab
insert into unwanted_aliment (aliment_id_aliment,user_id_user)
values
(5,'toto'),
(3,'pierre'),
(2,'jaques');
*/