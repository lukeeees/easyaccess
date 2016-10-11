<div class="container">
<div class="starter-template">
  <div class="jumbotron">
        <center><h1>Update Violation</h1>  </center>
    </div>

<?php
  
  foreach ($x->result() as $key) {
    echo "<table>";
      echo form_open('c_clear/VioUpdate');
  echo form_hidden('id',$this->uri->segment(3));

    echo "<tr>";
    echo "<td>".form_hidden('id',$key->id,'class="form-control" required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>ID Number</td>";
    echo "<td>".form_input('idnumber',$key->u_id,'class="form-control"required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Last Name</td>";
    echo "<td>".form_input('lastname',$key->lastname,'class="form-control"required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>First Name</td>";
    echo "<td>".form_input('name',$key->name,'class="form-control"required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Middle Name</td>";
    echo "<td>".form_input('middlename',$key->middlename,'class="form-control"required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Year</td>";
    echo "<td>".form_input('yearlevel',$key->year,'class="form-control" disabled required')."</td>";
    echo "<td>".form_hidden('yearlevel',$key->year,'class="form-control" required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>Course</td>";
    echo "<td>".form_input('course',$key->course,'class="form-control" disabled required')."</td>";
    echo form_hidden('course',$key->course,'class="form-control" required');
  echo "<tr>";

  echo "<tr>";
    echo "<td>Department</td>";
    echo "<td>".form_input('department',$key->department,'class="form-control" disabled required' )."</td>";
    echo form_hidden('department',$key->department,'class="form-control" required');
  echo "<tr>";

  echo "<tr>";
    echo "<td>Room</td>";
    echo "<td>".form_input('laboratory',$this->session->userdata('lab'),'class="form-control" disabled  required')."<td>";
    echo form_hidden('laboratory',$this->session->userdata('lab') ,'class="form-control"  required');
    //echo "<td>".form_input('laboratory',$key->laboratory,'class="form-control"required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>Violation</td>";
    echo "<td>".form_input('violation',$key->violation,'class="form-control"required')."</td>";
  echo "<tr>";

  
  echo "<td>Status</td>";
   $arrayName= array('Pending'    => 'Pending',
                     'Cleared' => 'Cleared');
   echo "<td>".form_dropdown('status',$arrayName,'','class="form-control" placeholder="Status" required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>&nbsp;</td>";  
    echo "<td>".form_submit('submit','Update','class="form-control"');
  echo "</tr>";

  echo form_close();
echo "</table>";
}
?>
