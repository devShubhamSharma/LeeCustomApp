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
<div class="container my-2">
  <div class="row">
    <div class="col-sm col-example">
    <form method="post" action='user/orderdetails.php'>
      <div class="form-group">
        <label for="exampleInputEmail1">Enter Your Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <button type="submit" class="btn btn-primary">Get Order Records</button>

      <a href="./user/productform.php">Create Custom Order</a>

    </form>
    </div>
    <div class="col-sm col-example">
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

</body>
</html>