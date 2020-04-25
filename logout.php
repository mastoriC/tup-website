<?
  require 'connect.php';
  session_id("loginUser");
  session_start();
  session_unset();
  session_destroy();
  header('Location: /index.php');
  return;
?>
