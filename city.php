<?php
$conn = new PDO("mysql:host=localhost;dbname=example",root,root);
if($_POST['id'])
{
	$id=$_POST['id'];
	
	$stmt = $conn->prepare("SELECT * FROM city WHERE state_id=:id");
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	?>
	<option selected="selected">Select City :</option>
	<?php 
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
		<option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
		<?php
	}
}
?>
