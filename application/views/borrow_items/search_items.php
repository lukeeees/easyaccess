<div class="container">
  <?php echo br(4); ?>
  <div class="panel">
    <div class="panel-body">
    <?php 
      $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
      echo form_open("borrow/ItemSearch", $attributes);?>
      <div class="form-group">
        <div class="col-md-6" style="margin-left:20%">
          <input class="form-control" id="name_search" name="name_search" placeholder="Search for Item Name" type="text" value="<?php echo set_value('name_search'); ?>" />
        </div>

        <div>
          <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
        </div>
      </div>
    <?php echo form_close(); ?>
    </div>
  </div>


  <div class="starter-template">
    <?php if (!$x): ?>
      <h2 style="margin-top:50px;text-align:center">No Items Found</h2>
        <?php else: ?>
          <div class="table">
          <h3><?php echo $this->session->userdata('lab'); ?></h3>
          <form action="../borrow/borrowedItems" method="POST">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th><center>#</center></th>
                  <th><center>Code</center></th>
                  <th><center>Item Name</center></th>
                  <th><center>Description</center></th>
                  <th><center>Remarks</center></th>              
                  <th><center>Available Quantity</center></th>
                  <th>Quantity</th>
                </tr>
              </thead>

              <tbody>

                <?php $i=1; foreach($x as $row_x){ ?>
                  <tr>
                    <td><center><?php echo $i++; ?></center></td>
                    <td><center><?php echo $row_x->code; ?></center></td>
                    <td><center><?php echo $row_x->name; ?></center></td>
                    <td><center><?php echo $row_x->description; ?></center></td>
                    <td><center><?php echo $row_x->remarks; ?></center></td>
                    <td><center><?php echo $row_x->availablequantity; ?></center></td>
                    <td>
                      <input type="number" name="quantity[<?php echo $row_x->code."---".$row_x->name; ?>][]" value="0" min="0" max="<?php echo $row_x->availablequantity; ?>" style="width:100px;" class='form-control'>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Id Number</label>
                      <input type="text" name = "borrowers_idnumber" id = "borrowers_idnumber" class = "form-control" required placeholder="ID Number"></input>
                    </div>
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" name = "borrowers_fname" id = "borrowers_fname" class = "form-control" required placeholder="First Name"></input>
                    </div>
                    <div class="form-group">
                      <label>Middle Name</label>
                      <input type="text" name = "borrowers_mname" id = "borrowers_mname" class = "form-control" required placeholder="Middle Name"></input>
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" name = "borrowers_lname" id = "borrowers_lname" class = "form-control" required placeholder="Last Name"></input>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                      <label>Subject</label>
                      <input type="text" name = "subject" id = "subject" class = "form-control" required placeholder="Subject"></input>
                    </div>
                    <div class="form-group">
                      <label>Schedule</label>
                      <input type="text" name = "schedule" id = "schedule" class = "form-control" required placeholder="Schedule"></input>
                    </div>
                    <div class="form-group">
                      <label>Table Number</label>
                      <input type="text" name = "tablenumber" id = "tablenumber" class = "form-control" required placeholder="Table Number"></input>
                    </div>
                    <div class="form-group">
                      <label>Instruction</label>
                      <input type="text" name = "instructor" id = "instructor" class = "form-control" required placeholder="Instruction"></input>
                    </div>
                    <input type="hidden" name = "code" id = "code" class = "form-control" value="<?php echo $row_x->code; ?>"></input>
                  </div>
                </div>        
                <div class="form-group">
                   <input type="submit" value="Borrow Items" name="borrowbtn" class="btn btn-primary">
                </div>
            </div>
          </form>
        </div>
    <?php endif ?>
  </div>
</div>
