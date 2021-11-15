<?php require_once "./app/autoload.php" ?>

<?php 

   if(isset($_GET['delete_id']) ){

      $delete_id = $_GET['delete_id'];
      $photo_id = $_GET['photo_id'];

      $sql="DELETE FROM student WHERE id='$delete_id' ";

      $conn->query($sql);

      unlink('./photo/'.$photo_id);
      header('location:student.php');

   }





?>

<?php 

   if(isset($_GET['active_id'])){

      $active_id=$_GET['active_id'];

      $sql="UPDATE student SET  status='active' WHERE id='$active_id' ";

      $conn->query($sql);
      header('location:student.php');

   }
?>

<?php 

if(isset($_GET['inactive_id'])){

   $inactive_id=$_GET['inactive_id'];

   $sql="UPDATE student SET  status='inactive' WHERE id='$inactive_id' ";

   $conn->query($sql);
   header('location:student.php');

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/font/font awesome/css/all.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title> Development Area </title>
</head>


<body>

  
                  <div class="tbl" style="width:900px;margin:100px auto 0;">
                  <a class="btn btn-primary" href="index.php">back</a>
                  <div class="card">
                     <div class="card-header">
                        <h5 class="card-title">All Srudent Data</h5>
                     </div>
                     <div class="card-body">
                        <table class="table table-striped text-center">
                           <thead>
                              <tr>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Username</th>
                                 <th>Email</th>
                                 <th>Cell</th>
                                 <th>Age</th>
                                 <th>Gender</th>
                                 <th>Shift</th>
                                 <th>Location</th>
                                 <th>Photo</th>
                                 <th>Status</th>
                                 <th>Action</th>

                              </tr>
                           </thead>
                           <tbody>
                              <?php 
                                 $sql="SELECT * FROM student";
                                 $all_data=$conn->query($sql);
                                 $i=1;

                                 while( $data=$all_data->fetch_assoc()){
                              ?>
                              <tr>
                                 <td><?php echo $i; $i++; ?></td>
                                 <td><?php echo $data['name'];?></td>
                                 <td><?php echo $data['uname'];?></td>
                                 <td><?php echo $data['email'];?></td>
                                 <td><?php echo $data['cell'];?></td>
                                 <td><?php echo $data['age'];?></td>
                                 <td><?php echo $data['gender'];?></td>
                                 <td><?php echo $data['shift'];?></td>
                                 <td><?php echo $data['location'];?></td>
                                 <td> <img style="width:60px;height:60px;" src="./photo/<?php echo $data['photo'];?>" alt=""> </td>
                                 <td>
                                       <?php if($data['status'] == 'inactive'): ?>

                                       <a class="btn btn-success" href="?active_id=<?php echo $data['id']; ?>"><i class="far fa-thumbs-up"></i></a>

                                       <?php elseif($data['status'] == 'active'):?>

                                       <a class="btn btn-danger" href="?inactive_id=<?php echo $data['id']; ?>"><i class="far fa-thumbs-down"></i></a>

                                       <?php endif;?>
                                 </td>
                                 <td>
                                    <a class="btn btn-primary" href="profile.php?profile_id=<?php echo $data['id']; ?>"><i class="far fa-eye"></i></a>
                                    <a class="btn btn-secondary" href="edit.php?edit_id=<?php echo $data['id']; ?>&photo_id=<?php echo $data['photo']; ?>"><i class="fas fa-edit"></i></a>
                                    <a id="del_id" class="btn btn-danger" href="?delete_id=<?php echo $data['id']; ?> &photo_id=<?php echo $data['photo']; ?>"><i class="fas fa-trash"></i></a>
                                 </td>
                              </tr>
                              <?php }?>
                           </tbody>
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