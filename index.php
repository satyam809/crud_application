<?php include 'header.php'; ?>
<div class="container">
  <!-- Search form -->
  <div class="row">
    <div class="col-md-6">
      <form class="form-inline">
        <input class="form-control ml-3 w-75" id="search" type="text" placeholder="Search" aria-label="Search">
      </form>
    </div>
    <div class="col-md-3 col-6">
      <!-- Button to Open the Modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
        Add
      </button>
      <!-- Insert Modal -->
      <?php include 'insert_form.php'; ?>
      <!-- Update Modal -->
      <?php include 'update_form.php'; ?>

    </div>
    <div class="col-md-3 col-6">
      <button class="btn btn-danger" id="multiple_delete">Multiple Delete</button>
    </div>
  </div>
  <div class="row">
    <div class=" col-sm-12 alert alert-success alert-dismissible fade show" id="alert" style="display: none;">
      <button type="button" class="close" data-dismiss="alert">&times;</button>
      <p id="message" style="margin-bottom:0rem;"></p>
    </div>

  </div>
  <!-- fetch-->
  <div class="row" id="show_table">
    <table class='table'>
      <thead>
        <tr>
          <th></th>
          <th>Sr.No</th>
          <th>Name</th>
          <th>Age</th>
          <th>Gender</th>
          <th>Designation</th>
          <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody></tbody>
    </table>
  </div>

</div>
<div class="container">
  <div class="row">
    <!-- pagination -->
    <ul class="pagination" style='margin-left: auto;
       margin-right: auto;'>
    </ul>
  </div>
</div>
<?php include 'footer.php'; ?>