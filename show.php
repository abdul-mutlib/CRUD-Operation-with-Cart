<div>
	div jo ap ne bnai ha jo format apny bnaya hua ha
	<?php
	//////// isset function//////////////
if (isset($_POST['show'])) {

	////////// 'show' is a name of button  ///////////// 
	
	$select="SELECT * FROM Table_Name"; ////// table ka name jaha se fetch krna ha
	$run=mysqli_query($conn,$select);   /////// run query code
	$txt=$_POST['txt'];     //// get txt value in a variable and store

	?>
	<p>
		<?php 
			echo $txt;  ////// Dispaly txt in the paragraph or header tag as you design

		?>
	</p>

	<!----- Close If Condition  -------->
	
<?php } ?>

<!------- Button -------->
<input type="submit" name="show" value="Next">
</div>