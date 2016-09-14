<?php
echo "add Lab Head";
echo "<table>";
	echo form_open('admin/adduser');
	echo "<tr>";
		echo "<td>Name</td>";
		echo "<td>".form_input('name')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Password</td>";
		echo "<td>".form_password('pass')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Confirm Password</td>";
		echo "<td>".form_password('cpass')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>Rank</td>";
		echo "<td>".form_input('rank')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Department</td>";
		echo "<td>".form_input('department')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','add user');
	echo "</tr>";

	echo form_close();
echo "</table>";

?>