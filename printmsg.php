
<?php

@include 'config.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_users.php');
}

?>


    
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
@media print
{

.btn
{

   display:none;
}




}



.brand-logo {
  height: 100px;
  width: 100px;
  background: url("");
  margin: auto;
  border-radius: 50%;
  box-sizing: border-box;
  box-shadow: 7px 7px 10px #cbced1, -7px -7px 10px white;
  background-repeat:no-repeat;
 background-color: black;
}

table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

table, td, th {
  border: 1px solid black;
}


@media print
{

.btn
{

   display:none;
}




}
  </style>
  <script>
  function Getprint()
{

window.print();

}

  </script>
  
</head>
<body>
<h1 class="title border" bg-color="black" style="background-color:#C30846; text-align:center; border: 1px solid black;">Lakme Users Message </h1> 
      
       

<br><br>
<div class="box-container">
<?php
       $select_message = mysqli_query($conn, "SELECT * FROM `message`") or die('query failed');
       if(mysqli_num_rows($select_message) > 0){
          while($fetch_message = mysqli_fetch_assoc($select_message)){
      ?>
     
     
   
   <table >


</tr>




  <tr style="border: 1px solid black;">
   
    <th>user id</th>
    <th>name</th>
    <th>Number</th>
    <th>email</th>
    <th>message</th>
   
  </tr>
  <tr >
    
    <td> <span><?php echo $fetch_message['user_id']; ?></span></td>
    <td><span><?php echo $fetch_message['name']; ?></span></td>
    <td> <span><?php echo $fetch_message['number']; ?></span> </td>
    <td><span><?php echo $fetch_message['email']; ?></span> </td>
    <td><span><?php echo $fetch_message['message']; ?></span>  </td>

  </tr>

  <tr>
  
</table>
<?php
         }
      }else{
         echo '<p class="empty">you have no messages!</p>';
      }
      ?>
   </div>
       <button type="button" class="btn btn-danger" style="background-color: #0074d9; color:white; width:80px; height:30px;" onclick="Getprint()" >Print</button>
           

      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  
</body>
</html>

