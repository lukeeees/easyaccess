<div class="container">
<div class="starter-template">
  <div class="jumbotron">
        <center><h1>Show Notifications</h1>  </center>
    </div>
          <?php if (!$x): ?>
              <h2 style="margin-top:50px;text-align:center">No Notifications Found</h2>
          <?php else: ?>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Action</th>
                    <th>Laboratory</th>
                    <th>Time</th>
                    <th>Date</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                foreach ($x as $row) {
                  $tmp = explode(" ",$row->date_added);
                  $newdate = date("F d, Y",strtotime($tmp[0]));
                  $newtime = date("H:i A",strtotime($tmp[1]));
                echo "<tr>
                    <td>".$row->action."</td>
                    <td>".$row->laboratory."</td>
                    <td>".$newtime."</td>
                    <td>".$newdate."</td>
                  </tr>";
                  }?>
                  
                 
                </tbody>
              </table>
            </div>
          <?php endif ?>
   </div>
</div><!-- /.container -->

