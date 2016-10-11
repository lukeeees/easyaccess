<div class="container">
<div class="starter-template">
	<div class="jumbotron">
        <center><h1>List of Users</h1>  </center>
    </div>
    <?php echo $this->session->flashdata('msg');?>
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
              $c=1;
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
   </div>
</div><!-- /.container -->


<script>
function doconfirm()
{
    job = confirm("Are you sure you want to delete this item?");
    if(job!=true)
    {
        return false;

    }
}
</script>