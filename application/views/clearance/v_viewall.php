<div class="container">
<div class="starter-template">
  <div class="jumbotron">
        <center><h1>Liabilities and Violations</h1>  </center>
    </div>
    <div class="panel">
        <div class="panel-body">
          <?php 
          $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
          echo form_open("", $attributes);?>
              <div class="form-group">
                  <div class="col-md-4 col-sm-offset-2" style="padding:0;">
                      <input class="form-control" id="name_search" name="name_search" placeholder="Search..." type="text" value="<?php echo set_value('name_search'); ?>" />
                  </div>
                  <div class="col-xs-3">       
                            <?php
                              $data = array(
                                        'name'  => 'By Name',
                                        'u_id' => 'By ID number',
                                        'year'  => 'by Year Level',
                                        'course' => 'by Course',
                                        'department'  => 'by Department',
                                        'laboratory' => 'by Room/Laboratory',
                                        'status'  => 'by Status' 
                              );

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
    
          <?php if (!$x): ?>
              <h2 style="margin-top:50px;text-align:center">No Violations Found</h2>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ID Number</th>
                    <th>Name</th>
                    <th>Yr</th>
                    <th>Course</th>
                    <th>Department</th>
                    <th>Violation</th>
                    <th>Room/Laboratory</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                <?php

                $c=1;
                foreach ($x as $row) {
                  if($row['status']=="Cleared")
                    $txt = "success";
                  else
                    $txt = "danger";
                echo "<tr>
                    <td>".$c."</td>
                    <td>".$row['u_id']."</td>
                    <td>".$row['lastname'].","." ".$row['name']." ".$row['middlename']."</td>
                    <td>".$row['year']."</td>
                    <td>".$row['course']."</td>
                    <td>".$row['department']."</td>
                    <td>".$row['violation']."</td>
                    <td>".$row['laboratory']."</td>
                    <td class='text-".$txt."'>".$row['status']."</td>
                  </tr>";
                   //a data-toggle="modal" data-target="#myModal" href="#">Logout</a>
                  $c++;
                  }?>
                  
                 
                </tbody>
              </table>
            </div>
          <?php endif ?>
   </div>
</div><!-- /.container -->

