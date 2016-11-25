<?php
if ($function == 1)
{
if ($mgroup['movies'] == 1)
{
echo "
Upload a Video<br>
.mov, .wma, .mp4, .mpeg, .mpg, and .avi are allowed.
<form enctype='multipart/form-data' action='index.php' method='POST'>
<input type='hidden' name='sum' value='9' />
<table>
<tr><td>Please choose a title:</td><td> <input type='text' name='title' /></td></tr>
<tr><td>Please choose a movie:</td><td> <input name='movie' type='file' id='movie' /></td></tr>
<tr><td valign='top'>Please add a comment:</td><td> <textarea cols='40' rows='5' name='uploadcomment'></textarea></td></tr>
<tr><td align='right' colspan='2'><input type='submit' value='Upload' /></td></tr>
</table>
</form>
Your file limit is " . $mgroup['mlimit'] . " Kb.";
}
}
?>