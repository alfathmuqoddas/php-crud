<html>
<title>Add Data</title>
<body>
<?php
include_once("config.php");

if (isset($_POST['submit'])) {
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$jobs = mysqli_real_escape_string($conn, $_POST['jobs']);

	if(empty($name) || empty($address) || empty($jobs)) {

		if(empty($name)) {
			echo "<span class=\"text-danger\">Name Fields is empty</span>"
		}

		if(empty($address)) {
			echo "<span class=\"text-danger\">Address Fields is empty</span>"
		}

		if(empty($jobs)) {
			echo "<span class=\"text-danger\">jobs Fields is empty</span>"
		}

		echo "<br/><a href=\"javascript:self.history.back();\">Go Back</a>";
	} else {

		$result = mysqli_query($conn, "INSERT INTO `malasngoding-user` (name, address, jobs) VALUES ('$name', '$address', '$jobs')");

		echo "<span>Data added successfully</span>"
	}
}
?>
</body>
</html>