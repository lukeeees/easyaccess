<?php 
  if(isset($_POST['lab']))
  {
    $check = $_POST['lab'];     
  }
  else
  {
    $check = $this->session->userdata('lab');
  }
?>
<div class="container">
  <?php echo br(4); ?>
  <div class="panel">
    <div class="panel-body">
        
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "u_id" => "searchform", "name" => "searchform");
        echo form_open("borrow/userlist", $attributes);?>
            <div class="form-group">
              <?php if ($this->session->userdata('type')=='admin'): ?>
                  <div class="col-xs-6 col-sm-3">
                    <select name="lab" class="form-control">
                      <?php foreach ($lab as $key => $value): ?>
                          <?php                            
                           if ($value->name == $check): ?>
                              <option value="<?php echo $value->name; ?>" selected><?php echo $value->name; ?></option>
                          <?php else: ?>  
                              <option value="<?php echo $value->name; ?>"><?php echo $value->name; ?></option>
                          <?php endif ?>
                          
                      <?php endforeach ?>
                    </select>
                  </div>
                  <div class="col-xs-6 col-sm-4" style="padding:0;">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search..." type="text" value="<?php echo set_value('name_search'); ?>" />
                  </div>
                  <div class="col-xs-6 col-sm-3">       
                            <?php
                              $data = array(
                                        'borrowers_idnumber'  =>  'by ID Number',
                                        'name'  => 'by Name',
                                        );

                              echo form_dropdown('searchBy',$data,set_value('searchBy'),'class="form-control"');
                     
                            ?>
                  </div>
                  <div class="col-xs-6 col-sm-2" style="padding:0;">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                  </div>
              <?php else: ?>
                  <div class="col-md-4 col-sm-offset-2" style="padding:0;">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search..." type="text" value="<?php echo set_value('name_search'); ?>" />
                  </div>
                  <div class="col-xs-3">       
                            <?php
                              $data = array(
                                        'borrowers_idnumber'  =>  'by ID Number',
                                        'name'  => 'by Name',
                                        );

                              echo form_dropdown('searchBy',$data,set_value('searchBy'),'class="form-control"');
                     
                            ?>
                  </div>
                  <div class="col-xs-2" style="padding:0;">
                    <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                  </div>
              <?php endif ?>                

            </div>
        <?php echo form_close(); ?>
        </div>
  </div>

   <ul class="nav nav-tabs">
  <li role="presentation" class="active"><?php echo anchor('borrow/userlist','Borrowed Item/s');?></li>
  <li role="presentation" ><?php echo anchor('borrow/returnitems','Returned Item/s');?></li>
 </ul>
  <div class="starter-template">
    <?php if (!$item): ?>

        <h2 style="margin-top:50px;text-align:center">No Results Found</h2>

    <?php else: ?>
    <div class="table-responsive">
      <h3>Borrow Transactions in <?php echo $check; ?></h3>
      <table class="table table-striped">
        <thead> 
          <tr>
            <th><center>#</center></th>
            <th><center>Id Number</th>
            <th><center>Name</center></th>     
            <th><center>Subject</center></th> 
            <th><center>Schedule</center></th>
            <th><center>Date/Time Borrowed</center></th>
            <th><center>Released By</center></th> 
            <?php if ($this->session->userdata('type')!="admin"): ?>
                <th><center>Action</center></th>
            <?php endif ?>
          </tr>
        </thead>

        <tbody>
          <?php $i =1;
                $count = 0;

           foreach($item as $row) { 

             $tmp = explode(" ",$row->borrowdate);
                  $newdate = date("F d, Y",strtotime($tmp[0]));
                  $newtime = date("h:i a",strtotime($tmp[1]));
                  ?>
            <tr>              
              <td><center><?php echo $i++; ?></center></td>
              <td><center><?php echo $row->borrowers_idnumber; ?></center></td>              
              <td><center><?php echo $row->borrowers_lname.", ".$row->borrowers_fname." ".$row->borrowers_mname; ?></center></td>
              <td><center><?php echo $row->subject; ?></center></td>              
              <td><center><?php echo $row->schedule; ?></center></td> 
              <td><center><?php echo "".$newdate." ".$newtime.""?></center></td>
              <td><center><?php echo $row->custodian; ?></center></td>             
              <?php if ($this->session->userdata('type')!="admin"): ?>
                  <td><center><?php echo anchor('/borrow/list_borrowed?idnum='.$row->borrowers_idnumber, 'View');?></center></td>              
              <?php endif ?>
            </tr>
          <?php
              $count += $row->quantity;
           }  ?>

        </tbody>
      </table>    
    </div>
  <?php endif; ?>
  </div>
</div>

