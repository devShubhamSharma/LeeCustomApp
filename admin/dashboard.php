<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <?php include('../cdn/data-cdn.php'); ?>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


</head>
<body>
    <h1 class="text-center">Order Details</h1>
    <button id="load">Load Data</button>
    <table id="table">
        <thead>
        <tr>
            <th>Sr no.</th>
            <th>Email</th>
            <th>Order Id</th>      
            <th>Phone</th>
            <th>Product Description</th>
            <th>Product Info</th>
            <th>Quantity</th>
            <th>Estimated Delivery Date</th>
            <th>Logo Name</th>
            <th>Show logo file</th>
            <th>Department</th>
            <th>Site</th>
            <th>Project Owner</th>
            <th>Sample File</th>
            <th>Order Date</th>
            <th>Status</th>
        </tr>
     </thead>
     <tbody>
    </tbody>
    </table>

    <script>
        $(function(){
            // $("#load").click(function(){
                $('#table').DataTable( {
                    stateSave: true,
                    bDestroy : true,
                    ajax: {
                        type: "POST",
                        dataType: "json",
                        url: "medium.php",
                        dataSrc: "data"
                    }
                } );
                $.ajax({
                type: "POST",
                url: "medium.php",
                data: {action: 'get'},
                dataType: "json",
                success: data=>{
                    console.log(data);
                    // $('#data').append(data);
                }
                });   
            // })
            // $('#table').DataTable();
        
      });
    </script>
</body>
</html>