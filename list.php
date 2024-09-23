<?php
    include 'conn.php';


?>
<!DOCTYPE html>
<html>
<head>
 <title></title>

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

 <link rel="stylesheet" type="text/css" href="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/css/jquery.dataTables.css">
   <script type="text/javascript" charset="utf8" src="https://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>

</head>
<body>

 <div class="container">
 <div class="col-lg-12">
 <br><br>
 <h1 class="text-warning text-center" > Display Table Data </h1>
 <br>
 <table  id="tabledata" class=" table table-striped table-hover table-bordered">
 
 <tr class="bg-dark text-white text-center">
 
 <th> Id </th>
 <th> Email </th>
 <th> Password </th>
 <th> State </th>
 <th> Sid </th>
 <th> Gender </th>
 <th> Hobbies </th>

 <th>Image</th>
 x
 <th> Delete </th>
 <th> Update </th>

 </tr >

 <?php

 include 'conn.php'; 
 $q = "select s.image_name,s.id as Stuid,s.email as mail,s.pwd as pswd,s.state,s.gender, s.hobbies,st.sid as sid,st.state  as States from student as s,state as st where s.state = st.sid ";

 $query = mysqli_query($conn,$q);

 while($res = mysqli_fetch_array($query)){
 ?>
 <tr class="text-center">
 <td> <?php echo $res['Stuid'];  ?> </td>
 <td> <?php echo $res['mail'];  ?> </td>
 <td> <?php echo $res['pswd'];  ?> </td>
 <td> <?php echo $res['States'];  ?> </td>
 <td> <?php echo $sid = $res['sid'];  ?> </td>
 <!-- Display Gender -->
 <td> <?php echo $res['gender']; ?> </td>
 <!-- Display Hobbies -->
     <td> <?php echo $res['hobbies']; ?> </td>

 <?php 

echo "
                    <td><img src='uploads/" . $res['image_name'] . "' width='100' height='100'></td>
    
                ";


?>
 <td> <button class="btn-danger btn"> <a href="delete.php?id=<?php echo $res['Stuid']; ?>" class="text-white"> Delete </a>  </button> </td>
 <td> <button class="btn-primary btn"> <a href="update.php?id=<?php echo $res['Stuid']; ?>&sid=<?php echo $res['sid'];  ?>" class="text-white"> Update </a> </button> </td>

 </tr>

 <?php 
 }
  ?>
 
 </table>  

 </div>
 </div>


</body>
</html>