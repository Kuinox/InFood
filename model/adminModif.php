<?php
include("../view/adminModifvue1.php");
//session_start();
//include("../controller/SQL/FUNCTIONS/connect.php");//connexion au bdd
$bdd=mysqli_connect("localhost","root","","infood");

if(isset($_POST['cher'])){
$login = $_POST['name'] ;//protège les chars pour l'utiliser  dans une requête SQL

$sel_user = "select * from user where pseudo='$login'";
$run_user = mysqli_query($bdd, $sel_user);

//recherche le nombre de fois le email et mot de passe existe
$check_user = mysqli_num_rows($run_user);

//s'il existe mot de passe et email
//connection réussi
if($check_user>0)
{
  //nouvelle connection à la base (necessiare)
  $bdd = new PDO('mysql:dbname=infood;host=localhost','root','');

  //recherche dans la bdd sur le nom
  $requete = $bdd->query("SELECT
              u.id_user,
              u.pseudo,
              u.password,
              u.email,
              u.height,
              u.weight,
              g.name_grade
              FROM
                USER u
              JOIN
                grade_user gu
              ON
                u.id_user = gu.user_id_user
              JOIN
                grade g
              ON
                gu.grade_id_grade = g.id_grade
                WHERE u.pseudo=$login");

  while($data = $requete->fetch())
		{
			// echo'<h2>'.$data['pseudo'].'</h2><br>';

			//mettre le nom dans une session
			$_SESSION['user2']=$data;
      var_dump($_SESSION['user2']);

		}
echo "oui";
//si le mot de passe et email n'existe pas.
//connection échouer
}else
{
  //affiche alert
  echo "non";
}
}

?>
