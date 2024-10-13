
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
<h1 class="title border" bg-color="black" style="background-color:#C30846; text-align:center; border: 1px solid black;">Lakme Users </h1> 
      
       

<br><br>
<div class="box-container">
      <?php
         $select_users = mysqli_query($conn, "SELECT * FROM `users`") or die('query failed');
         if(mysqli_num_rows($select_users) > 0){
            while($fetch_users = mysqli_fetch_assoc($select_users)){
      ?>
     
     
   
   <table >


</tr>




  <tr style="border: 1px solid black;">
   
    <th>name</th>
    <th>email</th>
   
  </tr>
  <tr >
    
    <td><?php echo $fetch_users['name']; ?></td>
    <td><?php echo $fetch_users['email']; ?></td>
    
  </tr>

  <tr>
  
</table>
</div>
      <?php
         }
      }
      ?>
       <button type="button" class="btn btn-danger" style="background-color: #0074d9; color:white; width:80px; height:30px;" onclick="Getprint()" >Print</button>
           

      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>  
</body>
</html>