<?php
class Registers{
  function getAllReg(){
    global $conn;
    $sql = "select * from regtb";
      $r = mysqli_query($conn, $sql);

      while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
          $res[]=$row;
      }
      echo json_encode($res,true);
  }
  
  function saveReg($data){
    global $conn;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query="INSERT INTO regtb(reg_name, reg_email) VALUES ('".$data->reg_name."','".$data->reg_email."')";
   // echo $query;
    $result=mysqli_query($conn, $query);

    }
  }
 
  function deleteReg($data){
    global $conn;
    $query = "DELETE FROM regtb WHERE reg_id=".$_REQUEST['id'];
    echo $result=mysqli_query($conn, $query);
      
  }

  function getRegById($data){
    global $conn;
    //$sql = "SELECT * FROM articletb WHERE article_id=".$_SERVER['QUERY_STRING'];
    $sql = "SELECT * FROM regtb WHERE reg_id=".$_REQUEST['id'];
    $r = mysqli_query($conn, $sql);

      while($row=mysqli_fetch_array($r,MYSQLI_ASSOC)) {
          $res=$row;
    }
    echo json_encode($res,true);
    
  }

  function updateReg($data){
    global $conn;
    $query = "UPDATE regtb SET reg_name='".$data->reg_name."', reg_email='".$data->reg_email."' WHERE reg_id=".$_REQUEST['id'];
    echo $result=mysqli_query($conn, $query);
   
  }

}