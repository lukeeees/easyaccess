<div class="container">
  <?php echo br(4); ?>
  <div class="panel panel-primary">
  </div>

   <ul class="nav nav-tabs">
  <li role="presentation" class="active"><?php echo anchor('borrow/userlist','Borrowed Item/s');?></li>
  <li role="presentation" ><?php echo anchor('borrow/ItemSearchReturn','Returned Item/s');?></li>
 </ul>
  <div class="starter-template">
    <?php if (!$item): ?>

        <h2 style="margin-top:50px;text-align:center">No Results Found</h2>

    <?php else: ?>
    <div class="table-responsive">
      <h3>Return Transactions in <?php echo $this->session->userdata('lab'); ?></h3>
      <table class="table table-striped">
        <thead> 
          <tr>
            <th><center>#</center></th>
            <th><center>Id Number</th>
            <th><center>Name</center></th>     
            <th><center>Subject</center></th> 
            <th><center>Schedule</center></th>
            <th><center>Date/Time Returned</center></th>
            <th><center>Received By</center></th> 
            <th><center>Action</center></th>
          </tr>
        </thead>

        <tbody>
          <?php $i =1;
                $count = 0;

           foreach($item as $row) { ?>
            <tr>              
              <td><center><?php echo $i++; ?></center></td>
              <td><center><?php echo $row->borrowers_idnumber; ?></center></td>              
              <td><center><?php echo $row->borrowers_lname.", ".$row->borrowers_fname." ".$row->borrowers_mname; ?></center></td>
              <td><center><?php echo $row->subject; ?></center></td>              
              <td><center><?php echo $row->schedule; ?></center></td> 
              <td><center><?php echo $row->schedule; ?></center></td>
              <td><center><?php echo $this->session->userdata('name'); ?></center></td>             
              <td><center><?php echo anchor('/borrow/list_borrowed?idnum='.$row->borrowers_idnumber, 'View');?></center></td>              
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

