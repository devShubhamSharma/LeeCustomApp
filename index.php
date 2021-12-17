<?php require 'header.php'; ?>

<div class="container-fluid" id="main">
<div class="c-row-bg row row-offcanvas row-offcanvas-left">
<?php require 'side-bar.php'; ?>

<div class="pt-4 col-md-9 col-lg-10 main c-full-height">
<div class="container-fluid mb-4">
  <h2 class="c-heading-h2">Dashboard</h2>
</div>
<div class="my-2">
  <?php
    session_start();
    if(isset($_SESSION['error'])){
   if($_SESSION['error'] != ''){?>
    <div class="alert alert-danger" role="alert">
      <?php echo $_SESSION['error']; ?>
    </div>
    <?php } } ?>
   
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="c-card-heading btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Track Order</button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
      <div class="card-body">
        <form method="post" action='user/trackorder.php'>
        <div class="form-group">
          <label for="exampleInputEmail1">Order Id</label>
          <input type="number" class="form-control" name="orderid" aria-describedby="emailHelp" placeholder="Order Id" required>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Enter Your Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" required placeholder="Enter email">
        </div>
        <button type="submit" class="c-submit-btn btn btn-primary">Track Order</button>

        <a href="./user/productform.php" class="c-link">Create Custom Order</a>

      </form>
     
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="c-card-heading btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Get All Order Details</button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <form method="post" action='user/orderdetails.php'>
        <div class="form-group">
          <label for="exampleInputEmail1">Enter Your Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button type="submit" class="c-submit-btn btn btn-primary">Get Order Records</button>

        <a href="./user/productform.php" class="c-link">Create Custom Order</a>

      </form>
    
      </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php require 'footer.php'; ?>