<?php
$conn = new PDO("mysql:host=localhost;dbname=example",'root','root');
if($_POST['id'])
{
	$id=$_POST['id'];
		
	$stmt = $conn->prepare('SELECT * FROM state WHERE country_id=:id');
	$stmt->bindParam(':id',$id);
	$stmt->execute();
	?>
	<option selected="selected">Select State :</option>
	<?php
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        	<option value="<?php echo $row['state_id']; ?>"><?php echo $row['state_name']; ?></option>
        <?php
	}
}
?>
