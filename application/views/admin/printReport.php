<div class="container">
<div class="starter-template">
    <div id="headerprint" class="jumbotron">
        <center><h1>Print Report</h1>  </center>
    </div>

<div>
<center><p  id="label">UNIVERSITY OF SAN CARLOS</p></center>
<center><p  id="label">Cebu City</p></center>
<center><p id="label">Inventory Sheet for OFFICE Equipments, Furniture, & Other Assets</p></center>
<center><p  id="label">(Per Department/Section)</p></center>
<center><p  id="label">(Alphabetical)</p></center>

<div>
<?php

foreach ($x->result() as $key) {

echo "<table>";
    
    echo "<tr>";
        echo "<td class='label1'>Department:</td>";
        echo "<td>".$key->department."<td>";

        echo "<td></td>";   
        echo "<td></td>";

        echo "<td class='label2'>Campus:</td>";
        echo "<td>".$key->campus."<td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td class='label1'>Department Head:</td>";
        echo "<td>".$key->departmenthead."<td>";
         echo "<td></td>";   
        echo "<td></td>";
         echo "<td></td>";   
        echo "<td></td>";
    echo "</tr>";

    echo "<tr>";
        echo "<td class='label1'>Building Name:</td>";
        echo "<td>".$key->buildingname."<td>";
    
        echo "<td class='label3'>Floor:</td>";
        echo "<td>".$key->floor."<td>";

        echo "<td class='label1'>Inventory Date</td>";
        echo "<td>".date("F d, Y",strtotime($key->inventorydate))."<td>";

    echo "</tr>";

    echo "<tr>";
        echo "<td class='label1'>Room: No./Name</td>";
        echo "<td>".$key->laboratory."<td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";
        echo "<td></td>";

    echo "</tr>";

    echo "<tr>";
        echo "<td class='label1'>Custodian/Accountable Officer:</td>";
        echo "<td>".$key->custodian."<td>";

        echo "<td></td>";
        echo "<td></td>";

        echo "<td class='label2'>Position:</td>";
        echo "<td>".$key->position."<td>";
    echo "</tr>";

$row = 1;
if (($handle = fopen("csv/".$key->csvFilename.".csv", "r")) !== FALSE) {
    
    echo '<table id="tableReport1" class="table table-striped">';
    
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        if ($row == 1) {
            echo '<thead><tr>';
        }else{
            echo '<tr>';
        }
        
        for ($c=0; $c < $num; $c++) {
            //echo $data[$c] . "<br />\n";
            if(empty($data[$c])) {
               $value = "&nbsp;";
            }else{
               $value = $data[$c];
            }
            if ($row == 1) {
                echo '<th id="tableReport1">'.$value.'</th>';
            }else{
                echo '<td id="tableReport1">'.$value.'</td>';
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
echo "<div style='clear:both;height:50px;'></div>";
echo "<table id='tableReport'>";
    echo "<tr>";
        echo "<td>Prepared By: &nbsp;&nbsp; </td>";
        echo "<td><u> ".$key->preparedby."</u><td>";

        echo "<td width='100px'></td>";
        echo "<td width='100px'></td>";

        echo "<td>Approved By: &nbsp;&nbsp;</td>";
        echo "<td><u> ".$key->departmenthead."</u><td>";
    echo "</tr>";
    echo "<tr>";
        echo "<td></td>";
        echo "<td>".$key->position.", ".$key->laboratory."<td>";

        echo "<td width='100px'></td>";
        echo "<td width='100px'></td>";

        echo "<td></td>";
         echo "<td>Department Chairman<td>";
    echo "</tr>";
echo "</table>";

    if ($user = $this->session->userdata('type')=="head") {
        echo "<div style='clear:both;height:50px;'></div>";
        echo "<table id='tableReport'>";
            echo "<tr>";
                echo "<td>Noted By: </td>";
                echo "<td> <u>Analiza Laurino</u><td>";

                echo "<td width='100px'></td>";
                echo "<td width='100px'></td>";

                echo "<td></td>";
                echo "<td><td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td></td>";
                echo "<td>Department Secretary<td>";

                echo "<td width='100px'></td>";
                echo "<td width='100px'></td>";

                echo "<td></td>";
                 echo "<td><td>";
            echo "</tr>";
        echo "</table>";
    }


}



?>

</div>
</div>
<div style="clear:both;height:30px;"></div>
<button id="print" onclick="window.print()">Print Report</button>
<div style="clear:both;height:30px;"></div>
