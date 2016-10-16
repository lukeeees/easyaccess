<div class="container">
<?php echo br(4); ?>
<div class="panel">
        <div class="panel-body">
        
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("c_clear/sVio", $attributes);?>
            <div class="form-group">
                <div class="col-md-4 col-sm-offset-2" style="padding:0;">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search..." type="text" value="<?php echo set_value('name_search'); ?>" />
                </div>
                <div class="col-xs-3">       
                          <?php
                            $data = array(
                                      'u_id'  =>  'by ID Number',
                                      'name'  => 'by Name',
                                      'year'  => 'by Year Level',
                                      'course' => 'by Course',
                                      'department'  => 'by Department',
                                      'laboratory' => 'by Room/Laboratory',
                                      'status'  => 'by Status'  );

                            echo form_dropdown('searchBy',$data,set_value('searchBy'),'class="form-control"');
                   
                          ?>
                </div>
                <div class="col-xs-2" style="padding:0;">
                  <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                </div>

            </div>
        <?php echo form_close(); ?>
        </div>
</div>

<?php echo $this->session->flashdata('msg');?>

  <ul class="nav nav-tabs">
  <li role="presentation" class="active"><?php echo anchor('c_clear/sVio','Violations');?></li>
  <li role="presentation" ><?php echo anchor('c_clear/sLia','Liabilities');?></li>
 </ul>
<div class="starter-template">
        <?php if (!$x): ?>
            <h2 style="margin-top:50px;text-align:center">No Violations Found</h2>
        <?php else: ?>        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><center>#</center></th>
                  <th><center>ID Number</center></th>
                  <th><center>Name</center></th>
                  <th><center>Year Level</center></th>
                  <th><center>Course</center></th>
                  <th><center>Department</center></th>
                  <th><center>Violation</center></th>
                  <th><center>Room/Laboratory</center></th>
                  <th><center>Date/Time</center></th>
                  <th><center>Status</center></th>
                  <th><center>Action</center></th> 
                  <th></th>
                </tr>
              </thead>
              <tbody>
              <?php

                $c=1+$start;
                foreach ($x as $row) {
                  if($row['status']=="Cleared")
                    $txt = "success";
                  else
                    $txt = "danger";
                echo "<tr>
                    <td>".$c."</td>
                    <td>".$row['u_id']."</td>
                    <td>".$row['lastname'].","." ".$row['name']." ".$row['middlename']."</td>
                    <td><center>".$row['year']."</center> </td>
                    <td>".$row['course']."</td>
                    <td><center>".$row['department']."</center></td>
                    <td>".$row['violation']."</td>
                    <td>".$row['laboratory']."</td>
                    <td><center>".date("m-d-Y h:ia ", strtotime($row['dateviolate']))."</center></td>
                    <td class='text-".$txt."'>".$row['status']."</td>
                    <td>" .anchor('c_clear/clearedvio/'.$row['id'],'<button type="button" class="btn-xs btn-danger" data-togg le="modal" data-target="update">Clear</button>', 'onclick="return doconfirm()"')."".anchor('c_clear/upVio/'.$row['id'],'<button type="button" class="btn-xs btn-success" data-toggle="modal" data-target="update">Update</button>')."</td>
                     </tr>";
                   
                  $c++;
                  }?>

              </tbody>
            </table>

          </div>
          <ul class="pagination pagination-sm">
            <?php echo $this->pagination->create_links(); ?>
          </ul> 
       <?php 
  $atts = array(
        'width'       => 800,
        'height'      => 600,
        'scrollbars'  => 'yes',
        'status'      => 'yes',
        'resizable'   => 'yes',
        'screenx'     => 0,
        'screeny'     => 0,
        'window_name' => '_blank'
);
 echo  anchor_popup('charts/graph_ClearanceVio/','<button class="btn-xs">Show Statistics</button>',$atts);?>
          </div>
        <?php endif ?>
    </div>
     <script>
                  function doconfirm()
                  {
                    job = confirm("Are you sure you want to clear violation?");
                    if(job!=true)
                    {
                        return false;

                    }
                  }
                  </script>