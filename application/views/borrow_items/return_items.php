<div class="container">
  <?php echo br(4); ?>
  <div class="panel panel-primary">
    <div class="panel-body">
    <?php 
      $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
      echo form_open("borrow/ItemSearchReturn", $attributes);?>
      <div class="form-group">
        <div class="col-md-6" style="margin-left:20%">
          <input class="form-control" id="name_search" name="name_search" placeholder="Search for Item Name" type="text" value="<?php echo set_value('name_search'); ?>" />
        </div>

        <div>
          <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
            <!--<a href="<?php //echo base_url(). "index.php/inventory/index"; ?>" class="btn btn-default">Show All</a> -->
        </div>
      </div>
    <?php echo form_close(); ?>
    </div>
  </div>


  <div class="starter-template">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>#</center></th>
            <th><center>ID Number</center></th>
            <th><center>ID</center></th>
            <th><center>First Name</center></th>
            <th><center>Middle Name</center></th>
            <th><center>Last Name</center></th>
            <th><center>Subject</center></th>
            <th><center>Schedule</center></th>
            <th><center>Instructor</center></th>
            <th><center>Tablenumber</center></th>
            <th><center>Quantity</center></th>
            <th><center>Item Code</center></th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $i=1; foreach($y as $row_y){ ?>
            <tr>
              <td><center><?php echo $i++; ?></center></td>
              <td><center><?php echo $row_y->borrowers_idnumber; ?></center></td>
              <td><center><?php echo $row_y->borrowers_id; ?></center></td>
              <td><center><?php echo $row_y->borrowers_fname; ?></center></td>
              <td><center><?php echo $row_y->borrowers_mname; ?></center></td>
              <td><center><?php echo $row_y->borrowers_lname; ?></center></td>
              <td><center><?php echo $row_y->subject; ?></center></td>
              <td><center><?php echo $row_y->schedule; ?></center></td>
              <td><center><?php echo $row_y->instructor; ?></center></td>
              <td><center><?php echo $row_y->tablenumber; ?></center></td>
              <td><center><?php echo $row_y->quantity; ?></center></td>
              <td><center><?php echo $row_y->item_code; ?></center></td>

              <td><button type="button" class = "btn-xs btn-success"  data-toggle="modal" data-target="#myownModalReturn<?php echo $row_y->item_code; ?><?php echo $row_y->quantity; ?>">Return</button></td>

              <!-- Modal Borrow --> 
              <div class="modal fade" id="myownModalReturn<?php echo $row_y->item_code; ?><?php echo $row_y->quantity; ?>" role="dialog">
                <div class="modal-dialog modal-lg">
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">BORROWER'S INFORMATION</h4>
                    </div>

                    <?php
                      echo @$msg;                      
                      echo form_open('borrow/returnedItems');
                    ?>

                    <form name="insertform" method="post" action="borrow/returnedItems" onsubmit="return validation()">
                      <div class="modal-body">

                        <input type="hidden" name = "borrowers_idnumber" id = "borrowers_idnumber" class = "form-control" value="<?php echo $row_y->borrowers_idnumber; ?>"></input>
                        <input type="hidden" name = "borrowers_id" id = "borrowers_id" class = "form-control" value="<?php echo $row_y->borrowers_id; ?>"></input>
                        <input type="hidden" name = "borrowers_fname" id = "borrowers_fname" class = "form-control" value="<?php echo $row_y->borrowers_fname; ?>"></input>
                        <input type="hidden" name = "borrowers_mname" id = "borrowers_mname" class = "form-control" value="<?php echo $row_y->borrowers_mname; ?>"></input>
                        <input type="hidden" name = "borrowers_lname" id = "borrowers_lname" class = "form-control" value="<?php echo $row_y->borrowers_lname; ?>"></input>
                        <input type="hidden" name = "subject" id = "subject" class = "form-control" value="<?php echo $row_y->subject; ?>"></input>
                        <input type="hidden" name = "schedule" id = "schedule" class = "form-control" value="<?php echo $row_y->schedule; ?>"></input>
                        <input type="hidden" name = "instructor" id = "instructor" class = "form-control" value="<?php echo $row_y->instructor; ?>"></input>
                        <input type="hidden" name = "tablenumber" id = "tablenumber" class = "form-control" value="<?php echo $row_y->tablenumber; ?>"></input>
                        <input type="hidden" name = "item_code" id = "item_code" class = "form-control" value="<?php echo $row_y->item_code; ?>"></input>
                        ID NUMBER : <?php echo $row_y->borrowers_idnumber; ?><br>
                        ID : <?php echo $row_y->borrowers_id; ?><br>
                        FIRST NAME : <?php echo $row_y->borrowers_fname; ?><br>
                        MIDDLE NAME : <?php echo $row_y->borrowers_mname; ?><br>
                        LAST NAME : <?php echo $row_y->borrowers_lname; ?><br>
                        QUANTITY : <?php echo $row_y->quantity; ?><br>
                        ITEM CODE :  <?php echo $row_y->item_code; ?><br>
                    
                       </select>
                        <br> -->
                        <!-- <input type="text" onkeypress='return event.charCode >= 1 && event.charCode <= 57' name = "quantity" id = "quantity" class = "form-control" required placeholder="ENTER QUANTITY TO RETURN"></input><br> -->
                        STATUS :  
                        <select name="status" id="status">
                          <option value="">Status...</option>
                          <option value="defective">Defective</option>
                          <option value="ok">Ok</option>
                        </select>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="submit" href="<?php echo base_url() ?>index.php/borrow/returnedItems" class="btn btn-primary">Return</button><br>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php echo form_close(); ?>
            </tr>
          <?php } ?>


        </tbody>
      </table>
    </div>
  </div>
</div>
