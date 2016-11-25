<?php
$target = "upload/";
$target = $target . basename( $_FILES['uploaded']['name']) ;
$type = $_FILES['uploaded']['type'];
$size = $_FILES['uploaded']['size'];
//This is our size condition
if ($size > 350000)
{
echo "Your file is too large.<br>";
}
else
{
//This is our limit file type condition
if ($type == 'image/gif' OR $type == 'image/jpeg' OR $type == 'image/pjpeg' OR $type == 'image/png' OR $type == 'image/gif' OR $type == 'image/jpg' OR $type == 'image/bmp')
{
if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target))
{
echo "The file ". basename( $_FILES['uploadedfile']['name']). " has been uploaded";
}
else
{
echo "Sorry, there was a problem uploading your file.";
}
}
else
{
echo "You cannot upload that file type, only .gif, .jpeg, .jpg, .png, and .bmp are allowed.<br>";
echo $_FILES['uploaded']['type'];
echo "<br>";
echo $filetype;
}
}
?>