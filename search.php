<?php
  include('functions.php');
  girisKontrol();
  session_write_close();
  
  $key=$_GET['key'];
  $array = array();
  $db = veriTabaninaBaglan();
  $query = $db->prepare("SELECT * FROM employee_pool WHERE fname LIKE '%{$key}%' OR lname LIKE '%{$key}%'");
  $query->execute();
  $data= $query->fetchAll();
  foreach ($data as $row) {
    $array[] = '<a href="employeesPool.php?detail='.$row["id"].'">'.$row['fname'].' '.$row['lname'].'</a>';
  }
  $query = $db->prepare("SELECT * FROM employee WHERE fname LIKE '%{$key}%' OR lname LIKE '%{$key}%'");
  $query->execute();
  $data= $query->fetchAll();
  foreach ($data as $row) {
    $array[] = '<a href="employees.php?detail='.$row["id"].'">'.$row['fname'].' '.$row['lname'].'</a>';
  }
  $query = $db->prepare("SELECT * FROM proje WHERE isim LIKE '%{$key}%'");
  $query->execute();
  $data= $query->fetchAll();
  foreach ($data as $row) {
    $array[] = '<a href="projects.php?detail='.$row["id"].'">'.$row['isim'].'</a>';
  }
  $query = $db->prepare("SELECT * FROM proje_pool WHERE isim LIKE '%{$key}%'");
  $query->execute();
  $data= $query->fetchAll();
  foreach ($data as $row) {
    $array[] = '<a href="projectsPool.php?detail='.$row["id"].'">'.$row['isim'].'</a>';
  }
  echo json_encode($array);
?>
