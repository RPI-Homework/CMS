<?php
if ($function == 1)
{
if ($mgroup['images'] == 1)
{
echo "
Upload an Image<br>
.gif, .jpeg, .jpg, .png, and .bmp are allowed.
<form enctype='multipart/form-data' action='index.php' method='POST'>
<input type='hidden' name='sum' value='8' />
<table>
<tr><td>Please choose a title:</td><td> <input type='text' size='40' name='title' /></td></tr>
<tr><td>Please choose an image:</td><td> <input name='image' size='40' type='file' /></td></tr>
<tr><td valign='top'>Please add a comment:</td><td> <textarea cols='40' rows='5' name='uploadcomment'></textarea></td></tr>
<tr><td align='right' colspan='2'><input type='submit' value='Upload' /></td></tr>
</table>
</form>
Your file limit is " . $mgroup['ilimit'] . " Kb.";
}
}
?>