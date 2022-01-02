<?php
include_once("config.php");

if(isset($_POST['update']))
{
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$jobs = mysqli_real_escape_string($conn, $_POST['jobs']);

	// checking empty fields
	if(empty($name) || empty($address) || empty($jobs)) {
				
		if(empty($name)) {
			echo "<font color='red'>Name field is empty.</font><br/>";
		}
		
		if(empty($address)) {
			echo "<font color='red'>Age field is empty.</font><br/>";
		}
		
		if(empty($jobs)) {
			echo "<font color='red'>Email field is empty.</font><br/>";
		}

	} else { 
		//updatingdata to database	
		$result = mysqli_query($conn, "UPDATE malasngoding_user SET nama='$name',alamat='$address',pekerjaan='$jobs' WHERE id=$id");
		header("Location: index.php");
	}
}
?>
<?php
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM malasngoding_user WHERE id=$id");

while($res = mysqli_fetch_array($result)) {
	$name = $res['nama'];
	$address = $res['alamat'];
	$jobs = $res['pekerjaan'];
}
?>

<html>
<head>
  <title>Edit Data</title>
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
  <div class="container">
  <h3 class="py-3">Edit Data</h3>
  <a href="index.php">← Home</a>
  <br/><br/>

  <form action="edit.php" method="post" name="form1" style="width:250px;">
    <label>Name</label>
    <input class="form-control" type="text" name="name" value="<?php echo $name; ?>"></td>
    <br/>
    <label>Address</label>
    <input class="form-control" type="text" name="address" value="<?php echo $address; ?>"></td>
    <br/>
    <label>Jobs</label>
    <input class="form-control" type="text" name="jobs" value="<?php echo $jobs; ?>"></td>
    <br/>
    <input type="hidden" name="id" value=<?php echo $_GET['id']; ?>></td>
    <br/>
    <input class="btn btn-primary" type="submit" name="update" value="Update Data"></td>
  </form>
</div>
</body>
</html>