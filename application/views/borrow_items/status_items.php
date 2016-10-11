<div class="container">
  <?php echo br(4); ?>
  <div class="panel panel-primary">
  </div>
  <div class="starter-template">
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th><center>Item Code</center></th>
            <th><center>Item Name</center></th>
            <th><center>Description</center></th>
            <th><center>Current Status</center></th>
            <th><center>Remarks</center></th>
            <th><center>Total Quantity</center></th>
            <th><center>Available Quantity</center></th>
            <th><center>Damaged Quantity</center></th>
            <th><center>Owner</center></th>
            <th><center>Borrower's Name</center></th>
            <th><center>Returned by</center></th>
            <th><center>Returned Date & Time</center></th>
          </tr>
        </thead>

        <tbody>
          <?php foreach ($other as $row2){ ?>

          <?php foreach ($data as $row){ ?>
            <tr>
              <td><center><?php echo $row->code; ?></center></td>
              <td><center><?php echo $row->name; ?></center></td>
              <td><center><?php echo $row->description; ?></center></td>
              <td><center><?php echo $row->currentstatus; ?></center></td>
              <td><center><?php echo $row->remarks; ?></center></td>
              <td><center><?php echo $row->totalquantity; ?></center></td>
              <td><center><?php echo $row->availablequantity; ?></center></td>
              <td><center><?php echo $row->damagedquantity; ?></center></td>
              <td><center><?php echo $row->owner; ?></center></td>
              <td><center><?php echo ""; ?></center></td>
              <td><center><?php echo $row2; ?></center></td>
            </tr>
          <?php } ?>

          <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>

