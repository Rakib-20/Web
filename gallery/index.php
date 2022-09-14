<?php
$server = "localhost";
$user = "root";
$pass = "";
$db = "university";

$conn = mysqli_connect($server, $user, $pass, $db);

if($conn){
	
}

$sql = "SELECT * FROM gallery";

$result = mysqli_query($conn, $sql);


if(isset($_POST["submit"])){
	
	$title = $_POST["title"];
	
	if(!$_FILES["image"]["size"]==0){
		$name = $_FILES["image"]["name"];
		$size = $_FILES["image"]["size"];
		$tmp_name = $_FILES["image"]["tmp_name"];
		$type = $_FILES["image"]["type"];
		
		$file_ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
		
		$extensions = array("jpg","png","jpeg");
		
		if(in_array($file_ext, $extensions)){
			$sql = "INSERT INTO gallery(title, image, views) VALUES('$title','default.png','0')";
			
			mysqli_query($conn, $sql);
			
			$last_id = mysqli_insert_id($conn);
			
			$new_image_name = $last_id.".".$file_ext;
			
			move_uploaded_file($tmp_name,"./uploads/".$new_image_name);
			
			$sql = "UPDATE gallery SET image = '$new_image_name' WHERE id = $last_id";
			
			mysqli_query($conn, $sql);
			
			echo "Image Uploaded successfully";
			
			header("location:index.php");
		}
		else{
			echo "File error!! only jpeg, png and jpg file are allowed";
		}
	}
}

?>

<html>
	<head>
		<title>Image Gallery</title>
	</head>
	<body>
		<div style="background-color:#f4f4f4; padding:10px">
		<h3 style="text-align:center">Upload Image in Gallery</h3>
		<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
			<table align="center">
				<tr>
					<td><label>Title: </label></td>
					<td><input type="text" name="title" required></td>
				</tr>
				<tr>
					<td><label>Image: </label></td>
					<td><input type="file" name="image" required></td>
				</tr>
				<tr>
					<td><input type="submit" value="submit" name="submit"></td>
					<td></td>
				</tr>
			</table>
		</form>
		</div>
		<div>
			<h3 style="text-align:center">Gallery</h3>
			
			<div style="display: flex; flex-wrap: wrap;">
			<?php while($row = mysqli_fetch_assoc($result)): ?>
				<div style="width:25%">
					<div style="margin:5px">
						<div  style="padding:5px; border:1px solid gray">
							<a href="view.php?id=<?php echo $row['id'] ?>"><img style="width:100%; height:130px" alter="Image" src="./uploads/<?php echo $row['image'] ?>"></a>
							<h4 style="text-align:center"><?php echo $row['title'] ?></h4>
						</div>
					</div>
				</div>
				<?php endwhile; ?>
			</div>
		</div>
	</body>
</html>