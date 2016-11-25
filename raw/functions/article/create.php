<?php
// Connects to Database$catname = mysql_query("SELECT * FROM `category` ORDER BY `name` ASC = '" . $_POST['name'] . "'");
echo "<form action='../index.php' method='post'>

<table border='0'>
	<tr>
		<td valign='top'>Title:</td><td>
			<input type='text' name='articlename' size='50' maxlength='50' value='" . $_POST['name'] . "'/>
		</td>
	</tr>

	<tr>
		<td valign='top'>Enter Your Content:</td><td>		
			<textarea rows='25' cols='50' name='content'>" . $_POST['article'] . "</textarea>
		</td>
	</tr>

	<tr>


		<td valign='top'>Assign A Category:</td><td>";

echo "<option value='0'>$catname</option>";
echo "</select></td></tr>";



echo "	<tr>
		<td valign='top'>Can Guests View?</td><td>
			Yes:<input type='radio' name='guest' value='1'>
			No:<input type='radio' name='guest' value='0'>
		</td>
	</tr>

	<tr>
		<td valign='top'>Are You The Original Author:</td><td>
			Yes:<input type='radio' name='author' value='1'>
			No:<input type='radio' name='author' value='0'>
		</td>
	</tr>

	<tr>
		<td valign='top'>Original Authors Name/Link:</td><td>
			<input type='text' name='referal' size='50' maxlength='50'>
		</td>
	</tr>

	<tr>
		<th colspan=2			<input type='hidden' name='sum' value='71'>					<input type='submit' name='submit' value='Submit'>		</th>
	</tr> 
</table>
</form>";
?>