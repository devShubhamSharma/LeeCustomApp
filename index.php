<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include "./cdn/data-cdn.php"; ?>
</head>
<body>
<?php include './user/header.php'; ?>
<div class="container my-2">
<div id="accordion">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Track Order</button>
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
        <button type="submit" class="btn btn-primary">Track Order</button>

        <a href="./user/productform.php">Create Custom Order</a>

      </form>
     
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Get All Order Details</button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
      <div class="card-body">
        <form method="post" action='user/orderdetails.php'>
        <div class="form-group">
          <label for="exampleInputEmail1">Enter Your Email</label>
          <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
        </div>
        <button type="submit" class="btn btn-primary">Get Order Records</button>

        <a href="./user/productform.php">Create Custom Order</a>

      </form>
    
      </div>
    </div>
  </div>
</div>
</div>

</body>
</html>