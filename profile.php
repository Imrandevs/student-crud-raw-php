<?php require_once "app/autoload.php";?> 


<?php


   if(isset($_GET['profile_id'] ) ){

      echo $profile_id = $_GET['profile_id'];

      $sql= "SELECT * FROM student WHERE id='$profile_id' ";

      $all_data=$conn->query($sql);

      $single_pro=$all_data->fetch_assoc();
   }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title> <?php echo $single_pro['name'];?> </title>
</head>

<style>
   .pro {
      width: 400px;
      margin: 100px auto 0;
}
   .pro h5{

      text-align: center;
      font-family: impact;
   }
   .pro h6{

      text-align: center;
}

   .pro img {
      width: 160px;
      height: 160px;
      border-radius: 50%;
      display: block;
      margin:auto;
}
</style>


<body>

   <div class="pro">
      <a class="btn btn-primary" href="student.php">Back</a>
      <div class="card">
         <div class="card-body">
            <img src="./photo/<?php echo $single_pro['photo'];?>" alt="">
            <h5> <?php echo $single_pro['name'];?></h5>
            <h6> <?php echo $single_pro['cell'];?></h6>
            <table class="table">
               <tr>
                  <td>Name :</td>
                  <td><?php echo $single_pro['name'];?></td>
               </tr>
               <tr>
                  <td>Email :</td>
                  <td><?php echo $single_pro['email'];?></td>
               </tr>
               <tr>
                  <td>Username :</td>
                  <td><?php echo $single_pro['uname'];?></td>
               </tr>
               <tr>
                  <td>Cell :</td>
                  <td><?php echo $single_pro['cell'];?></td>
               </tr>
               <tr>
                  <td>Age :</td>
                  <td><?php echo $single_pro['age'];?></td>
               </tr>
               <tr>
                  <td>Gender :</td>
                  <td><?php echo $single_pro['gender'];?></td>
               </tr>
               <tr>
                  <td>Shife :</td>
                  <td><?php echo $single_pro['shift'];?></td>
               </tr>
               <tr>
                  <td>Location :</td>
                  <td><?php echo $single_pro['location'];?></td>
               </tr>
            </table>
         </div>
      </div>
   </div>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>