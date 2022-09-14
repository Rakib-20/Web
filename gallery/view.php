<?php
		$server = "localhost";
		$user = "root";
		$pass = "";
		$db = "university";

		$conn = mysqli_connect($server, $user, $pass, $db);

		$id = $_GET['id'];
		$sql = "SELECT * FROM gallery WHERE id = $id";

		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);

		$recent_view = $row['views']+1;

		$sql = "UPDATE gallery SET views = '$recent_view' WHERE id = $id";

		mysqli_query($conn, $sql);

		$sql = "SELECT * FROM gallery WHERE id = $id";

		$result = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($result);


if($conn){
	
}
?>

<html>

    <head>
		<title>Image Gallery</title>
	</head>
	<body>
		<div style="text-align:center"> 
			<h2><?php echo $row['title'] ?></h2>
			<h4>Total Views: <?php echo $row['views'] ?></h4>
		</div>
	  <div style="text-align:center"><img style="width:50%; height:100%; border:2px solid gray; padding:10px;" alter="Image" src="./uploads/<?php echo $row['image'] ?>"></div>
	</body>
</html>