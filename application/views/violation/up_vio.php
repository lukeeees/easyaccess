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
    echo "<td>ID NUMBER</td>";
    echo "<td>".form_input('idnumber',$key->u_id,'class="form-control"required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>LAST NAME</td>";
    echo "<td>".form_input('lastname',$key->lastname,'class="form-control"required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>FIRST NAME</td>";
    echo "<td>".form_input('name',$key->name,'class="form-control"required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>MIDDLE NAME</td>";
    echo "<td>".form_input('middlename',$key->middlename,'class="form-control"required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>YEAR LEVEL</td>";
    echo "<td>".form_input('yearlevel',$key->year,'class="form-control"required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>COURSE</td>";
    echo "<td>".form_input('course',$key->course,'class="form-control"required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>DEPARTMENT</td>";
    echo "<td>".form_input('department',$key->department,'class="form-control"required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>VIOLATE AT</td>";
    echo "<td>".form_input('laboratory',$key->laboratory,'class="form-control"required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>VIOLATION</td>";
    echo "<td>".form_input('violation',$key->violation,'class="form-control"required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>ACTION</td>";
    echo "<td>".form_input('status',$key->status,'class="form-control"required')."</td>";
  echo "<tr>";

  echo "<tr>";
    echo "<td>&nbsp;</td>";  
    echo "<td>".form_submit('submit','UPDATE VIOLATOR','class="form-control"');
  echo "</tr>";

  echo form_close();
echo "</table>";
}
?>
