<div class="container">
<div class="starter-template">
  <div class="jumbotron">
        <center><h1>Edit User</h1>  </center>
    </div>
     <?php

  foreach ($user as $key) {
    echo "<table>";
  echo form_open('admin/dupdateuser');

  echo form_hidden('id',$this->uri->segment(3));
  echo "<tr>";
    echo "<td>ID Number</td>";
    echo "<td>".form_input('idnum',$key->idnumber,'class="form-control" placeholder="Id Number" required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Username</td>";
    echo "<td>".form_input('name',$key->name,'class="form-control" placeholder="Username" required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Last Name</td>";
    echo "<td>".form_input('lname',$key->lastname,'class="form-control" placeholder="Last Name" required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>First Name</td>";
    echo "<td>".form_input('fname',$key->firstname,'class="form-control" placeholder="First Name" required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Middle Name</td>";
    echo "<td>".form_input('mname',$key->middlename,'class="form-control" placeholder="Middle Name" required')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Password</td>";
    echo "<td>".form_password('pass','','class="form-control" placeholder="Password" required')."<td>";
  echo "<tr>";

    echo "<tr>";
    echo "<td>Type</td>";
        $type= array('admin'  =>  'admin',
                     'head'   =>  'labhead',
                     'staff'  =>   'staff');
    echo "<td>".form_dropdown('type',$type,$key->type,'class="form-control"')."</td>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>Department</td>";

    $values=array();
    if ($this->session->userdata('type')=="admin") {
      $values['DCpE'] = 'Department of Computer Engineering';
    }
    else {
      foreach ($lab as $key) {      
        $values[$key->name] = $key->name;
      }
    }  

    echo '<div class="form-group">';
    echo "<td>".form_dropdown('dept',$values,'','class="form-control"')."</td>";
    echo "</div>";
  echo "</tr>";

  echo "<tr>";
    echo "<td>&nbsp;</td>";
    echo "<td>".form_submit('submit','Update user','class="form-control"');
  echo "</tr>";

  echo form_close();
echo "</table>";
}
?>