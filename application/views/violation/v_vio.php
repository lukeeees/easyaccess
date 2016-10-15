<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Add Violation</h1>  </center>
    </div>
    <?php //echo $this->session->flashdata('msg');?>
 <?php
                    
echo "<table>";
	echo form_open('c_clear/addvio');
	echo "<tr>";
		echo "<td>ID Number</td>";
		echo "<td>".form_input('idnumber','','class="form-control" placeholder="ID Number" required')."</td>";
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
		$arrayName = array('N/A'	 =>		'---N/A---',
						   '1st Yr'	 => 	'FIRST YEAR',
						   '2nd Yr'	 =>		'SECOND YEAR',
						   '3rd Yr'	 =>		'THIRD YEAR',
						   '4th Yr'	 =>		'FOURTH YEAR',
						   '5th Yr'	 =>		'FIFTH YEAR');
		echo "<td>".form_dropdown('yearlevel',$arrayName,'','class="form-control" placeholder="Year Level"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Course</td>";
		$arrayName = array(	'Faculty' =>	'Faculty',
							'BS-CE'	 => 	'Civil Engineering',
						   'BS-CHE'	 =>		'Chemical Engineering',
						   'BS-CpE'	 =>		'Computer Engineering',
						   'BS-ECE'	 =>		'Electronics Engineering',
						   'BS-EE'	 =>		'Electrical Engineering',
						   'BS-IE'	 =>		'Industrial Engineering',
						   'BS-ME'	 =>		'Mechanical Engineering');
		echo "<td>".form_dropdown('course',$arrayName,'','class="form-control" placeholder="Course"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Department</td>";
		$arrayName = array('DCpE'	 => 	'Department of Computer Engineering',
						   'DCE'	 =>		'Department of Civil Engineering',
						   'DCHE'	 =>		'Department of Chemical Engineering',
						   'DEEE'	 =>		'Department of Electrical and Electronics Engineering',+
						   'DIE'	 =>		'Department of Industrial Engineering',
						   'DME'	 =>		'Department of Mechanical Engineering');
		echo "<td>".form_dropdown('department',$arrayName,'','class="form-control" placeholder="Department"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Room</td>";
		echo "<td>".form_input('laboratory',$this->session->userdata('lab'),'class="form-control" disabled  required')."<td>";
		echo form_hidden('laboratory',$this->session->userdata('lab'),'class="form-control"  required');
		/*$values=array();
		foreach ($laboratory->result() as $key) {
					 $values[$key->name] = $key->name;
				}		
		*/
		//echo "<td>".form_dropdown('laboratory',$values,'','class="form-control" placeholder="Laboratory"')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Violation</td>";
		echo "<td".form_input('violation','','class="form-control" placeholder="Violation" required')."</td>";
	echo "</tr>";
	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','Submit','class="form-control"'	);
	echo "</tr>";

	echo form_close();
echo "</table>";

?>