<?php
// Connects to Database
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='2'>
<table border='0'>
<tr><td>Username:</td><td>
<input type='text' name='username' maxlength='32'>
</td></tr>
<tr><td>Password:</td><td>
<input type='password' name='pass' maxlength='32'>
</td></tr>
<tr><td>Confirm Password:</td><td>
<input type='password' name='pass2' maxlength='32'>
</td></tr>
<tr><td>Email:</td><td>
<input type='text' name='email'>
</td></tr>
<tr><td>Confirm Email:</td><td>
<input type='text' name='email2'>
</td></tr>
<tr><td>Referral:</td><td>
<input type='text' name='referal'>
</td></tr>
<tr><th colspan=2><input type='submit' name='submit' value='Register'></th></tr> </table>
</form>";
?>