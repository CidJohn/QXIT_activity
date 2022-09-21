<?php
include '../db_conn.php';
$msg = '';
$error = '';
$sex = '';
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
    } else if (empty($mname)) {
        $error = 'Middlename Field is Empty';
    } else if (empty($lastname)){
        $error = 'Lastname Field is Empty';
    } else if (empty($bday)){
        $error = 'Birthday is Empty';
    } else if (empty($gender)) {
        $error = 'Gender is Required';
    } else if (empty($cphone)) {
        $error = "Cellphone Number is Required!";
    } else if (empty($address)){
        $error = 'Please input you Address';
    } 
    else{
    $sql = "INSERT INTO applicant_table(`first_name`,`middle_name`,`last_name`,`birthdate`,`gender`, `cellphone_no`, `address`) 
    VALUES ('$firstname', '$mname','$lastname', '$bday', '$gender', '$cphone', '$address')";
    $result = mysqli_query( $conn , $sql );
    if(!$result){
        echo 'error';
    }else {
        // header('location: ../index.php');
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
    <?php include '../boostrap/links.php'; ?>
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
          <a class="nav-link active" aria-current="page" href="../index.php">Table Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Adding info</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


        <form action="" method="post" >
            <div class="container mt-5 ">
            <div class="card w-50 mx-auto">
                <div class="text-center mt-2 h3">New Personal Data Sheet</div>
                <span class="bg-success text-center"><?php echo $msg; ?></span>
                <span class="bg-danger text-center text-light"><?php echo $error; ?></span>
                <div class="card-body">
        <div class=" mt-2">
        <input
            class="form-control border"
            id="formControlReadonly"
            type="text"
            name="firstname"
            placeholder="Firstname"
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
            required
        />
        </div>
        <label class="form-check-label" for="inlineRadio1">Gender:</label>
        <div class="form-check form-check-inline mt-2">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="Male" required/>
        <label class="form-check-label" for="inlineRadio1">Male</label>
        </div>

        <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="Female" required/>
        <label class="form-check-label" for="inlineRadio2">Female</label>
        </div>
        <div class=" mt-2">
        <input
            class="form-control border"
            id="formControlReadonly"
            type="text"
            name="cellphone"
            placeholder="Cellphone Number"
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
            required
        />
        </div>
        <input type="Submit" name='Submit' value="Add Info" class="btn btn-primary mt-2">
                </div>
                </div>
           
            </div>
      
        </form>

</body>
</html>