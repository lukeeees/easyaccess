<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Edit User Info</h1>  </center>
    </div>
<?php
echo $this->session->flashdata('msg');          

echo "<table>";
	echo form_open('');
	echo "<input type='hidden' name='id' value='".$userinfo->id."'>";
	echo "<tr>";
		echo "<td>ID Number</td>";
		echo "<td>".form_input('idnum',$userinfo->idnumber,'class="form-control" placeholder="ID Number" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Last Name</td>";
		echo "<td>".form_input('lname',$userinfo->lastname,'class="form-control" placeholder="Last Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>First Name</td>";
		echo "<td>".form_input('fname',$userinfo->firstname,'class="form-control" placeholder="First Name" required')."</td>";
	echo "</tr>";

 	echo "<tr>";
		echo "<td>Middle Name</td>";
		echo "<td>".form_input('mname',$userinfo->middlename,'class="form-control" placeholder="Middle Name" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td><label>Station</label></td>";		

		$values=array();

      	foreach ($laboratory as $key) {      
	        $values[$key->name] = $key->name;
      	}  

		echo '<div class="form-group">';
		echo "<td><select name='dept' class='form-control'>";		
		if($userinfo->department == "DCpE")
			echo "<option value='DCpE' selected>DCpE</option>";
		else
			echo "<option value='DCpE'>DCpE</option>";		
			foreach ($laboratory as $key) {
				if($key->name == $userinfo->department)
					echo '<option value="'.$key->name.'" selected>'.$key->name.'</option>';				
				else
					echo '<option value="'.$key->name.'">'.$key->name.'</option>';
			}
	
		echo "</select></td>";
		echo "</div>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Username</td>";
		echo "<td>".form_input('name',$userinfo->name,'class="form-control" placeholder="Username" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td>Password</td>";
		echo "<td>".form_password('pass',$userinfo->password,'class="form-control" placeholder="Password" required')."<td>";
	echo "<tr>";

	echo "<tr>";
		echo "<td>&nbsp;</td>";
		echo "<td>".form_submit('submit','Add LAB Head','class="form-control"');
	echo "</tr>";

	echo form_close();
echo "</table>";
?>