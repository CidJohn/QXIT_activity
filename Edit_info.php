<?php
include 'db_conn.php';
$msg = '';
$error = '';
$edi=$_GET['edit'];
$query = "SELECT * FROM applicant_table WHERE id = '". $edi ."'";
$r = mysqli_query($conn, $query);
$rs = mysqli_num_rows($r);
if($rs > 0){
    while($data = mysqli_fetch_array($r)){
        if(isset($_POST['Submit'])) {
            $firstname = $_POST['firstname'];
            $mname = $_POST['middlename'];
            $lastname = $_POST['lastname'];
            $bday = $_POST['birthdate'];
            $gender = $_POST['gender'];
            $cphone = $_POST['cellphone'];
            $address = $_POST['address'];
        
            if(empty($firstname)){
                $error = 'Firstname Field is Empty';
            } 
            else{
            $sql = "UPDATE applicant_table SET `first_name`='$firstname', `middle_name`='$mname', `last_name`='$lastname',
                    `birthdate`='$bday', `gender`='$gender', `cellphone_no`='$cphone', `address`='$address' WHERE id = '".$edi."'";
            $result = mysqli_query( $conn , $sql );
            if(!$result){
                $error = 'error';
            }else {
                header('location: index.php');
                
                $msg='success';
            }
        }
        }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include 'boostrap/links.php'; ?>
</head>
<body>
    <!-- As a link -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">QXIT</a>
    <button
      class="navbar-toggler"
      type="button"
      data-mdb-toggle="collapse"
      data-mdb-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Table Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Adding_page/adding.php">Adding info</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


        <form action="" method="post" >
            <div class="container mt-5 ">
            <div class="card w-50 mx-auto">
                <div class="h3 text-center mt-2">Update Information</div>
                <span class="bg-success text-center"><?php echo $msg; ?></span>
                <span class="bg-danger text-center text-light"><?php echo $error; ?></span>
                <div class="card-body">
                <?php

            ?>
            
        <div class=" mt-2">
        <input
            class="form-control border"
            id="formControlReadonly"
            type="text"
            name="firstname"
            placeholder="Firstname"
            value="<?php echo $data['first_name'] ?>"
            required
        />
        </div>
        <div class=" mt-2">
        <input
            class="form-control border"
            id="formControlReadonly"
            type="text"
            name="middlename"
            placeholder="Middlename"
            value="<?php echo $data['middle_name'] ?>"
            required
        />
        </div>
        <div class=" mt-2">
        <input
            class="form-control border"
            id="formControlReadonly"
            type="text"
            name="lastname"
            placeholder="Lastname"
            value="<?php echo $data['last_name'] ?>"
            required
        />
        </div>
        <div class=" mt-2">
        <input
            class="form-control border"
            id="formControlReadonly"
            type="date"
            name="birthdate"
            placeholder="Birthday"
            value="<?php echo $data['birthdate'] ?>"
            required
        />
        </div>
        <label class="form-check-label" for="inlineRadio1">Gender:</label>
        <div class="form-check form-check-inline mt-2">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required/>
        <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>

        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" required />
        <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
        <div class=" mt-2">
        <input
            class="form-control border"
            id="formControlReadonly"
            type="text"
            name="cellphone"
            placeholder="Cellphone Number"
            value="<?php echo $data['cellphone_no'] ?>"
            required
        />
        </div>
        <div class=" mt-2">
        <input
            class="form-control border"
            id="formControlReadonly"
            type="text"
            name="address"
            placeholder="Address"
            value="<?php echo $data['address'] ?>"
            required
        />
        </div>
        <input type="Submit" name='Submit' value="Update" class="btn btn-primary mt-2">
        <?php
                        }
                    }
        ?>

                </div>
                </div>
           
            </div>

        </form>

</body>
</html>