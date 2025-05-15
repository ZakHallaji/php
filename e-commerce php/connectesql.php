<?php
$host='localhost';
$bdname='e-commerce';
$username='root';
$password='';
try {
$connect= new PDO("mysql:host=$host;dbname=$bdname",$username,$password);
} 
catch(PDOException $e){
echo 'Erreur:'. $e->getMessage();
}
?>