<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add Violation</h1>  </center>
    </div>
 <?php
                    
echo "<table>";
	echo form_open('c_clear/addvio');
	echo "<tr>";
		echo "<td>ID NUMBER</td>";
		echo "<td>".form_input('idnumber','','class="form-control" placeholder="ID NUMBER" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>LAST NAME</td>";
		echo "<td>".form_input('lastname','','class="form-control" placeholder="LAST NAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>FIRST NAME</td>";
		echo "<td>".form_input('name','','class="form-control" placeholder="FIRST NAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>MIDDLE NAME</td>";
		echo "<td>".form_input('middlename','','class="form-control" placeholder="MIDDLE NAME" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>YEAR LEVEL</td>";
		$arrayName = array('1st Yr'	 => 	'FIRST YEAR',
						   '2nd Yr'	 =>		'SECOND YEAR',
						   '3rd Yr'	 =>		'THIRD YEAR',
						   '4th Yr'	 =>		'FOURTH YEAR',
						   '5th Yr'	 =>		'FIFTH YEAR');
		echo "<td>".form_dropdown('yearlevel',$arrayName,'class="form-control" placeholder="Year Level"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>COURSE</td>";
		$arrayName = array('BS-CE'	 => 	'Civil Engineering',
						   'BS-CHE'	 =>		'Chemical Engineering',
						   'BS-CpE'	 =>		'Computer Engineering',
						   'BS-ECE'	 =>		'Electronics Engineering',
						   'BS-EE'	 =>		'Electrical Engineering',
						   'BS-IE'	 =>		'Industrial Engineering',
						   'BS-ME'	 =>		'Mechanical Engineering');
		echo "<td>".form_dropdown('course',$arrayName,'class="form-control" placeholder="Course"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>DEPARTMENT</td>";
		$arrayName = array('CpE'	 => 	'Department of Computer Engineering',
						   'CE'		 =>		'Department of Civil Engineering',
						   'CHE'	 =>		'Department of Chemical Engineering',
						   'EEE'	 =>		'Department of Electrical and Electronics Engineering',
						   'IE'		 =>		'Department of Industrial Engineering',
						   'ME'		 =>		'Department of Mechanical Engineering');
		echo "<td>".form_dropdown('department',$arrayName,'class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>VIOLATE AT</td>";
		$arrayName = array('DCpE'	 => 'Department of Computer Engineering',
						   'LB264TC'	 => 	'LB264TC',
						   'LB265TC'	 => 	'LB265TC',	
						   'LB266TC'	 =>		'LB266TC',
						   'LB267TC'	 =>		'LB267TC');
		echo "<td>".form_dropdown('laboratory',$arrayName,'class="form-control" placeholder="Laboratory"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>VIOLATION</td>";
		echo "<td>".form_input('violation','','class="form-control" placeholder="VIOLATION" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>ACTION</td>";
		$arrayName= array('Pending' 	 => 'Pending',
						  'For Approval' => 'For Approval');
		echo "<td>".form_dropdown('status',$arrayName,'class="form-control" placeholder="Status" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','Add Violation','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";

?>