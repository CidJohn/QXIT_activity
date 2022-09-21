<?php include 'db_conn.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QXIT activity</title>
    <?php include 'boostrap/links.php'; ?>
</head>
<body>
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
          <a class="nav-link active" aria-current="page" href="#">Table Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Adding_page/adding.php">Adding info</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<div class="container mt-5">
<form action="" method="post">
<div class="card">
    <div class="card-body">
    <table class="table table-hover">
  <thead>
    <tr>
        <th>Firstname</th>
        <th>Middle name</th>
        <th>Lastname</th>
        <th>Birthdate</th>
        <th>Gender</th>
        <th>Cell Phone Number</th>
        <th>Address</th>
        <th>Edit Info</th>
        <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $sql = "SELECT * FROM applicant_table";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
    ?>
    <tr>
        <td><?php echo $row['first_name'] ?></td>
        <td><?php echo $row['middle_name'] ?></td>
        <td><?php echo $row['last_name'] ?></td>
        <td><?php echo $row['birthdate'] ?></td>
        <td><?php echo $row['gender'] ?></td>
        <td><?php echo $row['cellphone_no'] ?></td>
        <td><?php echo $row['address'] ?></td>
        <td><a href="Edit_info.php?edit=<?php echo $row['id']?>" class="btn btn-primary">Edit</a></td>
        <td><a href="delete.php?delete=<?php echo $row['id'] ?>" class="btn btn-danger"> Delete</a></td>
    </tr>
    <?php
        }
    ?>
  </tbody>
</table>

    </div>
</div>
</form>
</div>
</body>
</html>