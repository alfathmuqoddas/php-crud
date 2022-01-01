<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>

    <title>PHP Crud App</title>
  </head>
  <body>
    <div class="judul text-center my-2">
        <h1>PHP Crud Web App</h1>
    </div>
    <br/>
    <?php
    if(isset($_GET['message'])){
        $message = $_GET['message'];
        if($message == "input"){
            echo "Data input successful";
        } else if($message == "update"){
            echo "Data updated succesfully";
        } else if($message == "delete"){
            echo "Data deleted successfully";
        }
    }
    ?>
    <br/>

    <div class="container">
    <a class="btn btn-primary my-2" href="input.php">Add New Data</a>
    <h3>Data User</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">Jobs</th>
                <th scope="col">Option</th>
            </tr>
        </thead>
        <?php
        include "config.php";
        $query = mysql_query("SELECT * FROM `malasngoding-user`")or die(mysql_error());
        $no = 1;
        while($data = mysql_fetch_array($query)){
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    <td><?php echo $data['pekerjaan']; ?></td>
                    <td>
                        <a class="btn btn-primary" href="edit.php?id=<?php echo $data['id']; ?>">Edit</a>
                        <a class="btn btn-danger" href="delete.php?id=<?php echo $data['id']; ?>">Delete</a>
                    </td>
                </tr>
            </tbody>
        <?php } ?>
    </table>
    </div>




    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>