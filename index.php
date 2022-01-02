<!DOCTYPE html>
<html lang="en">
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>PHP MySQL Crud Simple</title>
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body>
<?php
include_once("config.php");
$result = mysqli_query($conn, "SELECT * FROM `malasngoding_user` ORDER BY id DESC");
?>

<div class="container">
<h1 class="text-center my-3">PHP MySQL Crud Web App</h1>
<a href="add.html" class="btn btn-primary my-2">Add New Data</a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Name</th>
      <th scope="col">Adress</th>
      <th scope="col">Jobs</th>
      <th scope="col">Option</th>
    </tr>
  </thead>
<?php
$num = 1;
while($res = mysqli_fetch_array($result)) {
	echo "<tbody>";
	echo "<tr>";
	echo "<th scope=\'row\'>".$num++."</th>";
	echo "<td>".$res['nama']."</td>";
	echo "<td>".$res['alamat']."</td>";
	echo "<td>".$res['pekerjaan']."</td>";
	echo "<td><a class=\"btn btn-success me-2\" href=\"edit.php?id=$res[id]\">Edit</a><a class=\"btn btn-danger\" href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
	echo "</tr>";
	echo "</tbody>";
}
?>
</table>
</div>
</body>
</html>
