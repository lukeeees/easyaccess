<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add Violation</h1>  </center>
    </div>
 <?php
                    
echo "<table>";
	echo form_open('admin/addvio');
	echo "<tr>";
		echo "<td>Id Number</td>";
		echo "<td>".form_input('idnumber','','class="form-control" placeholder="Id Number" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Last Name</td>";
		echo "<td>".form_input('lastname','','class="form-control" placeholder="Last Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>First Name</td>";
		echo "<td>".form_input('name','','class="form-control" placeholder="First Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Middle Name</td>";
		echo "<td>".form_input('middlename','','class="form-control" placeholder="Middle Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Year Level</td>";
		$arrayName = array('1'	 => 	'First Year',
						   '2'	 =>		'Second Year',
						   '3'	 =>		'Third Year',
						   '4'	 =>		'Fourth Year',
						   '5'	 =>		'Fifth Year');
		echo "<td>".form_dropdown('yearlevel',$arrayName,'class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Course</td>";
		$arrayName = array('BS-CE'	 => 	'Civil Engineering',
						   'BS-CHE'	 =>		'Chemical Engineering',
						   'BS-CpE'	 =>		'Computer Engineering',
						   'BS-ECE'	 =>		'Electronics Engineering',
						   'BS-EE'	 =>		'Electrical Engineering',
						   'BS-IE'	 =>		'Industrial Engineering',
						   'BS-ME'	 =>		'Mechanical Engineering');
		echo "<td>".form_dropdown('course',$arrayName,'class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Department</td>";
		$arrayName = array('CpE'	 => 	'Department of Computer Engineering',
						   'CE'		 =>		'Department of Civil Engineering',
						   'CHE'	 =>		'Department of Chemical Engineering',
						   'EEE'	 =>		'Department of Electrical and Electronics Engineering',
						   'IE'		 =>		'Department of Industrial Engineering',
						   'ME'		 =>		'Department of Mechanical Engineering');
		echo "<td>".form_dropdown('department',$arrayName,'class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Violation</td>";
		echo "<td>".form_input('violation','','class="form-control" placeholder="Violation" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Laboratory</td>";
		$arrayName = array('CEAC1'	 => 	'CEAC1 Laboratory',
						   'CEAC2'	 => 	'CEAC2 Laboratory',
						   'CEAC3'	 => 	'CEAC3 Laboratory',	
						   'CISCO'	 =>		'CISCO Laboratory',
						   'CNLAB'	 =>		'CN Laboratory',
						   'DML285'	 =>		'DML285 Laboratory',
						   'DML286'	 =>		'DML286 Laboratory',
						   'NCRLAB'	 =>		'NCR Laboratory',
						   'PCBLAB'  =>		'PCB Laboratory');
		echo "<td>".form_dropdown('laboratory',$arrayName,'class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Status</td>";
		echo "<td>".form_input('status','','class="form-control" placeholder="Status" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','Add Violation','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";

?>