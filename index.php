<?php require_once "app/autoload.php"?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <title> Development Area </title>
</head>

<?php 

//database connection

   

   //value isset
   if(isset($_POST['submit']) ){
      //get value

      $name       =$_POST['name'];
      $uname      =$_POST['uname'];
      $email      =$_POST['email'];
      $cell       =$_POST['cell'];
      $age        =$_POST['age'];
      if(isset($_POST['gender']) ){
      $gender     =$_POST['gender'];
      }
      $shift      =$_POST['shift'];
      $location   =$_POST['location'];

      //file upload

      $file_name=$_FILES['photo']['name'];
      $file_tmp_name=$_FILES['photo']['tmp_name'];

      $unique_name=md5(time().rand()).$file_name;

      move_uploaded_file($file_tmp_name,'./photo/'.$unique_name);

      if(strlen($cell)== 11){

         $cell_v= true;

      }else{

         $cell_v= false;
      }

      if( empty($name) || empty($uname) || empty($email) || empty($cell) || empty($age) || empty($gender ) || empty($shift ) || empty($location ) ){


          $mess=validate('All fields are require !');

      }else if($cell_v == false){

         $mess=validate('Invalid Cell !','warning');

      }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){

         $mess=validate('Invalid Email !','warning');

      }else{

         $sql="INSERT INTO student(name,uname,email,cell,age,gender,shift,location,photo)values('$name','$uname','$email','$cell','$age','$gender','$shift','$location','$unique_name')";
         $conn->query($sql);

         $mess=validate('Data stable','success');
      }


   }


?>

<body>

 
   <div class="stu shadow" style="width:350px;margin:100px auto 0;">
      <a class="btn btn-primary" href="student.php">All Student</a>
         <div class="card">
                 <div class="card-header">
                      <h5 class="card-title">Information</h5>
                          <?php
                            if(isset($mess)){

                                echo $mess;

                                }
                          ?>
                  </div>
                 <div class="card-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                         <div class="form-group">
                              <label for="">Name</label>
                              <input name="name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="">Username</label>
                              <input name="uname" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="">Email</label>
                              <input name="email" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="">Cell</label>
                              <input name="cell" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="">Photo</label>
                              <input name="photo" type="file" class="form-control-file">
                        </div>
                        <div class="form-group">
                              <label for="">Age</label>
                              <input name="age" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                              <label for="">Gender</label><br>
                              <input name="gender" type="radio" value="male" id="male"><label for="male">Male</label>
                              <input name="gender" type="radio" value="female" id="female"><label for="female">Female</label>
                        </div>
                        <div class="form-group">
                              <label for="">Shift</label>
                              <select name="shift" class="form-control" id="">
                                 <option value="">-Select-</option>
                                 <option value="Day">Day</option>
                                 <option value="Evening">Evening</option>
                              </select>
                        </div>
                        <div class="form-group">
                              <label for="">Location</label>
                              <select name="location" class="form-control" id="">
                                 <option value="">-Select-</option>
                                 <option value="Dhaka">Dhaka</option>
                                 <option value="Gazipur">Gazipur</option>
                                 <option value="Cumilla">Cumilla</option>
                                 <option value="Chitagong">Chitagong</option>
                                 <option value="Sylhet">Sylhet</option>
                              </select>
                        </div>
                        
                        <div class="form-group">
                        <input name ="submit" type ="submit" class="btn btn-sm btn-primary" value="Add">
                        </div>
                     </form>
                 </div>
         </div>
   </div>
   <br>
   <br>
   <br>
   <br>
   <br>
   <br>

    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>