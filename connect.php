<?
  $host = 'localhost';
  $username = 'root';
  $password = '';
  $database = 'tupschooldb';

  $conn = mysqli_connect($host,$username,$password,$database) or die('Cannot connect to the Database.');
  mysqli_set_charset($conn,"utf8");
?>
