<?php
if ($function == 1)
{
if ($cookie == 1)
{
$box3 = mysql_query("SELECT * FROM `memberskin` WHERE `id` LIKE '%' ORDER BY `skin`")or die("<br>Error Code 1066: Please contact the Root Administrator immediately.<br>" . mysql_error());
echo "<h3>Editing Profile</h3>";
echo "<div align='right'><a href='index.php?idx=43'>Change Password</a> - <a href='index.php?idx=41'>Edit Date</a> - <a href='index.php?idx=42'>Change Avatar</a> - <a href='index.php?idx=44'>Change Signature</a></div>";
echo "<form action='index.php' method='post'>
<input type='hidden' name='sum' value='4'>";
echo "<table>";
echo "<tr><td>Location</td><td><input type='text' name='location' value='" . $member['location'] . "' /></td></tr>";
echo "<tr><td>Birthday</td><td><select name='month'>";
$mvalue = gmdate(n, $member['birthday']);
$month = gmdate(F, $member['birthday']);
if ($member['birthday'] != 0)
{
echo "<option value='" . $mvalue . "' selected='selected'>" . $month . "</option>";
echo "<option value='0'>None</option>";
}
else
{
echo "<option value='0' selected='selected'>None</option>";
}
echo "<option value='1'>January</option>
<option value='2'>Febuary</option>
<option value='3'>March</option>
<option value='4'>April</option>
<option value='5'>May</option>
<option value='6'>June</option>
<option value='7'>July</option>
<option value='8'>August</option>
<option value='9'>September</option>
<option value='10'>October</option>
<option value='11'>November</option>
<option value='12'>December</option>
</select>
<select name='day'>";
$day = gmdate(j, $member['birthday']);
if ($member['birthday'] != 0)
{
echo "<option value='" . $day . "' selected='selected'>" . $day . "</option>";
echo "<option value='0'>None</option>";
}
else
{
echo "<option value='0' selected='selected'>None</option>";
}
echo "<option value='1'>1</option>
<option value='2'>2</option>
<option value='3'>3</option>
<option value='4'>4</option>
<option value='5'>5</option>
<option value='6'>6</option>
<option value='7'>7</option>
<option value='8'>8</option>
<option value='9'>9</option>
<option value='10'>10</option>
<option value='11'>11</option>
<option value='12'>12</option>
<option value='13'>13</option>
<option value='14'>14</option>
<option value='15'>15</option>
<option value='16'>16</option>
<option value='17'>17</option>
<option value='18'>18</option>
<option value='19'>19</option>
<option value='20'>20</option>
<option value='21'>21</option>
<option value='22'>22</option>
<option value='23'>23</option>
<option value='24'>24</option>
<option value='25'>25</option>
<option value='26'>26</option>
<option value='27'>27</option>
<option value='28'>28</option>
<option value='29'>29</option>
<option value='30'>30</option>
<option value='31'>31</option>
</select>
<select name='year'>";
$year = gmdate(Y, $member['birthday']);
if ($member['birthday'] != 0)
{
echo "<option value='" . $year . "' selected='selected'>" . $year . "</option>";
echo "<option value='0'>None</option>";
}
else
{
echo "<option value='0' selected='selected'>None</option>";
}
echo "<option value='2010'>2010</option>
<option value='2009'>2009</option>
<option value='2008'>2008</option>
<option value='2007'>2007</option>
<option value='2006'>2006</option>
<option value='2005'>2005</option>
<option value='2004'>2004</option>
<option value='2003'>2003</option>
<option value='2002'>2002</option>
<option value='2001'>2001</option>
<option value='2000'>2000</option>
<option value='1999'>1999</option>
<option value='1998'>1998</option>
<option value='1997'>1997</option>
<option value='1996'>1996</option>
<option value='1995'>1995</option>
<option value='1994'>1994</option>
<option value='1993'>1993</option>
<option value='1992'>1992</option>
<option value='1991'>1991</option>
<option value='1990'>1990</option>
<option value='1989'>1989</option>
<option value='1988'>1988</option>
<option value='1987'>1987</option>
<option value='1986'>1986</option>
<option value='1985'>1985</option>
<option value='1984'>1984</option>
<option value='1983'>1983</option>
<option value='1982'>1982</option>
<option value='1981'>1981</option>
<option value='1980'>1980</option>
<option value='1979'>1979</option>
<option value='1978'>1978</option>
<option value='1977'>1977</option>
<option value='1976'>1976</option>
<option value='1975'>1975</option>
<option value='1974'>1974</option>
<option value='1973'>1973</option>
<option value='1972'>1972</option>
<option value='1971'>1971</option>
<option value='1970'>1970</option>
<option value='1969'>1969</option>
<option value='1968'>1968</option>
<option value='1967'>1967</option>
<option value='1966'>1966</option>
<option value='1965'>1965</option>
<option value='1964'>1964</option>
<option value='1963'>1963</option>
<option value='1962'>1962</option>
<option value='1961'>1961</option>
<option value='1960'>1960</option>
<option value='1959'>1959</option>
<option value='1958'>1958</option>
<option value='1957'>1957</option>
<option value='1956'>1956</option>
<option value='1955'>1955</option>
<option value='1954'>1954</option>
<option value='1953'>1953</option>
<option value='1952'>1952</option>
<option value='1951'>1951</option>
<option value='1950'>1950</option>
<option value='1949'>1949</option>
<option value='1948'>1948</option>
<option value='1947'>1947</option>
<option value='1946'>1946</option>
<option value='1945'>1945</option>
<option value='1944'>1944</option>
<option value='1943'>1943</option>
<option value='1942'>1942</option>
<option value='1941'>1941</option>
<option value='1940'>1940</option>
<option value='1939'>1939</option>
<option value='1938'>1938</option>
<option value='1937'>1937</option>
<option value='1936'>1936</option>
<option value='1935'>1935</option>
<option value='1934'>1934</option>
<option value='1933'>1933</option>
<option value='1932'>1932</option>
<option value='1931'>1931</option>
<option value='1930'>1930</option>
<option value='1929'>1929</option>
<option value='1928'>1928</option>
<option value='1927'>1927</option>
<option value='1926'>1926</option>
<option value='1925'>1925</option>
<option value='1924'>1924</option>
<option value='1923'>1923</option>
<option value='1922'>1922</option>
<option value='1921'>1921</option>
<option value='1920'>1920</option>
<option value='1919'>1919</option>
<option value='1918'>1918</option>
<option value='1917'>1917</option>
<option value='1916'>1916</option>
<option value='1915'>1915</option>
<option value='1914'>1914</option>
<option value='1913'>1913</option>
<option value='1912'>1912</option>
<option value='1911'>1911</option>
<option value='1910'>1910</option>
<option value='1909'>1909</option>
<option value='1908'>1908</option>
<option value='1907'>1907</option>
<option value='1906'>1906</option>
<option value='1905'>1905</option>
<option value='1904'>1904</option>
<option value='1903'>1903</option>
<option value='1902'>1902</option>
</select>
</td><td>";
echo "<tr><td>Gender</td><td>";
if ($member['gender'] == 1)
{
echo "Male<input type='radio' name='gender' value='1' checked='checked' />";
echo "Female<input type='radio' name='gender' value='0' /></td></tr>";
}
else
{
echo "Male<input type='radio' name='gender' value='1' />";
echo "Female<input type='radio' name='gender' value='0' checked='checked' /></td></tr>";
}
echo "<tr><td>AIM</td><td><input type='text' name='aim' value='" . $member['aim'] . "' /></td></tr>";
echo "<tr><td>MSN</td><td><input type='text' name='msn' value='" . $member['msn'] . "' /></td></tr>";
echo "<tr><td>YIM</td><td><input type='text' name='yim' value='" . $member['yim'] . "' /></td></tr>";
echo "<tr><td>ICQ</td><td><input type='text' name='icq' value='" . $member['icq'] . "' /></td></tr>";
echo "<tr><td>URL</td><td><input type='text' name='url' value='" . $member['url'] . "' /></td></tr>";
echo "<tr><td>Interests</td><td><textarea rows='3' cols='30' name='interests'>" . $member['interests'] . "</textarea></td></tr>";
echo "<tr><td>Referal</td><td><input type='text' name='referal' value='" . $member['referal'] . "' /></td></tr>";
echo "<tr><td>Selected Skin</td><td><select name='skin'>";
while($row = mysql_fetch_assoc($box3))
{
if ($gen['skin'] == $member['skin'] AND $member['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Default)</option>";
}
else if ($member['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "' selected='selected'>" . $row['skin'] . " (Current)</option>";
}
else if ($gen['skin'] == $row['id'])
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . " (Default)</option>";
}
else
{
echo "<option value='" . $row['id'] . "'>" . $row['skin'] . "</option>";
}
}
echo "</select></td></tr>";
echo "<tr><td colspan='2'><input type='submit' name='pro' value='Update Profile' /></td></tr>";
echo "</table>";
echo "</form>";
}
}
?>