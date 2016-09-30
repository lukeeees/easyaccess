<div class="container">
<div class="starter-template">
  <div class="jumbotron">
        <center><h1>Show Violation</h1>  </center>
    </div>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>ID Number</th>
                  <th>Name</th>
                  <th>Year Level</th>
                  <th>Course</th>
                  <th>Department</th>
                  <th>Violation</th>
                  <th>Laboratory</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              <?php

              $c=1;
              foreach ($x as $row) {
              echo "<tr>

                  <td>".$c."</td>
                  <td>".$row['u_id']."</td>
                  <td>".$row['lastname'].","." ".$row['name']." ".$row['middlename']."</td>
                  <td>".$row['year']."</td>
                  <td>".$row['course']."</td>
                  <td>".$row['department']."</td>
                  <td>".$row['violation']."</td>
                  <td>".$row['laboratory']."</td>
                  <td>".$row['status']."</td>
        
                </tr>";
                 //a data-toggle="modal" data-target="#myModal" href="#">Logout</a>
                $c++;
                }?>
                
               
              </tbody>
            </table>
          </div>
   </div>
</div><!-- /.container -->

