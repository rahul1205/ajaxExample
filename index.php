<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
$conn = new PDO("mysql:host=localhost;dbname=example",root,root);
?>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	
	$(".country").change(function()
	{
		var id=$(this).val();
		var myString = 'id='+ id;
		$(".state").find('option').remove();
		$(".city").find('option').remove();
		$.ajax
		({
			type: "POST",
			url: "state.php",
			data: myString,
			cache: false,
			success: function(html)
			{
				$(".state").html(html);
			} 
		});
	});
	
	
	$(".state").change(function()
	{
		var id=$(this).val();
		var myString = 'id='+ id;
	
		$.ajax
		({
			type: "POST",
			url: "city.php",
			data: myString,
			cache: false,
			success: function(html)
			{
				$(".city").html(html);
			} 
		});
	});
	
});
</script>
</head>

<body>
<div>
<label>Country :</label> 
<select name="country" class="country">
<option selected="selected">--Select Country--</option>
<?php
	$stmt = $conn->prepare("SELECT * FROM country");
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC))
	{
		?>
        <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
        <?php
	} 
?>
</select>
<br><br>
<label>State :</label> 
<select name="state" class="state">
<option selected="selected">--Select State--</option>
</select>

<br><br>
<label>City :</label> <select name="city" class="city">
<option selected="selected">--Select City--</option>
</select>

<br><br><br>
</div>

</body>
</html>
