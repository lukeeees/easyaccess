<?php
//just include this part during integration
echo "<table>";

echo form_open('account/login');
echo "<tr>";
	echo "<td>Id Number</td>";
		echo "<td>".form_input('name','','required')."</td>";
echo "</tr>";
echo "<tr>";
	echo "<td>Password</td>";
		echo "<td>".form_password('password','','required')."</td>";
echo "</tr>";
echo "<tr>";
	echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','Login')."</td>";
echo "</tr>";
echo form_close();
?>