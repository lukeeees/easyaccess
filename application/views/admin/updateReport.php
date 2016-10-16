<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>Update Report</h1>  </center>
    </div>

<div id="printing">

<?php

foreach ($x->result() as $key) {
	echo @$msg;                       
echo "<table id='tableReport' class='table1'>";
	echo form_open('inventory_admin/UpdateInventoryToDB');

	echo form_hidden('inventoryid',$this->uri->segment(3));

  	echo "<tr>";
		echo "<td>".form_hidden('inventoryid',$key->inventoryid,'class="form-control" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td class='label1'>Department:</td>";
		echo form_hidden('department','COMPUTER ENGINEERING','class="form-control1" required ');
		echo "<td>".form_input('department1','COMPUTER ENGINEERING',' disabled  class="form-control1" required')."<td>";

		echo "<td></td>";
		echo "<td></td>";

		echo "<td class='label2'>Campus:</td>";
		echo form_hidden('campus','Talamban Campus','  class="form-control1" required');
		echo "<td>".form_input('campus1','Talamban Campus',' disabled class="form-control1" required')."<td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td class='label1'>Department Head:</td>";
		echo "<td>".form_input('departmenthead',$key->departmenthead,' placeholder="Department Head" class="form-control1" required')."</td>";
	echo "</tr>";

	echo "<tr>";
		echo "<td class='label1'>Building Name:</td>";
		echo form_hidden('buildingname','BUNZEL',' class="form-control1 required');
		echo "<td>".form_input('buildingName1','BUNZEL',' disabled  class="form-control2" required')."<td>";
	
		echo "<td class='label3'>Floor</td>";
		echo "<td>".form_input('floor',$key->floor,' placeholder="Floor" class="form-control2" required')."</td>";

		echo "<td class='label1'>Inventory Date</td>";
		date_default_timezone_set("Asia/Manila");
		echo form_hidden('inventorydate',''.date("Y").'-'.date("m").'-'.date("d").'','  class="form-control1" required');
		echo form_hidden('csvFilename',''.date("F").'_'.date("d").'_'.date("Y").'_'.date("h").'_'.date("i").'_'.date("s").'','  class="form-control1" required');
		echo "<td>".form_input('inventorydate1',''.date("F").' '.date("d").', '.date("Y").'',' disabled  class="form-control1" required')."<td>";

	echo "</tr>";

	echo "<tr>";
		echo "<td class='label1'>Room: No./Name</td>";
		echo form_hidden('laboratory',$key->laboratory,' class="form-control1 required');
		echo "<td>".form_input('laboratory',$key->laboratory,'placeholder="Room No./Name" disabled class="form-control1" required')."<td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";
		echo "<td></td>";

	echo "</tr>";

	echo "<tr>";
		echo "<td class='label1'>Custodian/Accountable Officer:</td>";
		echo "<td>".form_input('custodian',$key->custodian,'placeholder="Custodian" class="form-control1" required')."<td>";

		echo "<td></td>";
		echo "<td></td>";

		echo "<td class='label2'>Position:</td>";
		echo "<td>".form_input('position',$key->position,'placeholder="Position" class="form-control1" required')."<td>";
	echo "</tr>";


$row = 1;
if (($handle = fopen("csv/".$key->csvFilename.".csv", "r")) !== FALSE) {
    
    echo '<table class="table table-striped">';
    
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        if ($row == 1) {
            echo '<thead><tr>';
        }else{
            echo '<tr>';
        }
        
        for ($c=0; $c < $num; $c++) {
            if(empty($data[$c])) {
               $value = "&nbsp;";
            }else{
               $value = $data[$c];
            }
            if ($row == 1) {
                echo '<th>'.$value.'</th>';
            }else{
                echo '<td>'.$value.'</td>';
            }
        }
        
        if ($row == 1) {
            echo '</tr></thead><tbody>';
        }else{
            echo '</tr>';
        }
        $row++;
    }
    
    echo '</tbody></table>';
    fclose($handle);
}

echo "</table>";

echo "<table id='tableReport'>";
	echo "<tr>";
		echo "<td>Prepared By:</td>";
		echo "<td>".form_input('preparedby',$key->preparedby,' placeholder="Prepared By" class="form-control1" required')."</td>";

		echo "<td width='100px'></td>";
		echo "<td width='100px'></td>";

		echo "<td></td>";
		echo "<td></td>";
	echo "</tr>";
//echo "<tr><td><button type='button' class='btn-xl btn-danger'>Submit</button></td></tr>";	
echo "</table>";

echo form_submit('submit','UPDATE','class="form-control"');
echo form_close();


}
?>




