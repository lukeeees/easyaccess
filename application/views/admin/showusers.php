<div class="container">
<div class="starter-template">
  <?php echo br(3);?>


<div class="panel">
        <div class="panel-body">
        <?php 
        $attributes = array("class" => "form-horizontal", "role" => "form", "id" => "searchform", "name" => "searchform");
        echo form_open("admin/sUser", $attributes);?>
            <div class="form-group">
                <div class="col-md-4 col-sm-offset-2" style="padding:0;">
                    <input class="form-control" id="name_search" name="name_search" placeholder="Search User" type="text" value="<?php echo set_value('name_search'); ?>" />

                    
                </div>
                <div class="col-xs-3">
                                       
                         
                          <?php
                          $data = array(
                                      'idnumber '   =>  'By ID Number',
                                      'lastname'    =>  'By Last Name',
                                      'name'        =>  'By Username',
                                      'type'        =>  'By Type',
                                      'department'  =>  'By Station' );
                          echo form_dropdown('searchBy',$data,set_value('searchBy'),'class="form-control"');
                   ?>
                </div>
                <div class="col-xs-2" style="padding:0;">
                  <input id="btn_search" name="btn_search" type="submit" class="btn btn-danger" value="Search"/>
                </div>

            </div>
    <?php echo $this->session->flashdata('msg');?>
    <?php if (!$x): ?>
            <h2 style="margin-top:50px;text-align:center">No Results Found</h2>
      <?php else: ?>
          <div class="table-responsive">
            <table class="table table-striped" ,>
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID number</th>
                  <th>Username</th>
                  <th>Type</th>
                  <th>First Name</th>
                  <th>Middle Name</th>
                  <th>Last Name</th>
                  <th>Station</th>
                  <th>Option</th>
                </tr>
              </thead>
              <tbody>
              <?php 
              $c=1+$start;
              foreach ($x as $row) {
              echo "<tr>

                  <td>".$c."</td>
                  <td>".$row['idnumber']."</td>
                  <td>".$row['name']."</td>
                  <td>".$row['type']."</td>
                  <td>".$row['firstname']."</td>
                  <td>".$row['middlename']."</td>
                  <td>".$row['lastname']."</td>
                  <td>".$row['department']."</td>

                  <td>".anchor('admin/deleteuser/'.$row['id'],'<button type="button" class="btn-xs btn-danger">Delete</button>','onclick="return doconfirm()"')."".anchor('admin/updateuser/'.$row['id'],'<button type="button" class="btn-xs btn-success" data-toggle="modal" data-target="update">Update</button>')."</td>
                </tr>";
               
                $c++;
              }?>
                
               
              </tbody>
            </table>
          </div>
          <ul class="pagination pagination-sm">
            <?php echo $this->pagination->create_links(); ?>
          </ul>
      <?php endif ?>
   </div>
</div><!-- /.container -->


<script>
function doconfirm()
{
    job = confirm("Are you sure you want to delete this User?");
    if(job!=true)
    {
        return false;

    }
}
</script>