<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <?php include('../cdn/data-cdn.php'); ?>
  <style>
    .logos {
      display: flex;
      flex-wrap: wrap;
      border-bottom: 0 !important;
    }

    .logos>div {
      flex: 1 1 15rem;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      padding: 10px;
    }

    .logos>div * {
      margin: 0;
      line-height: 1;
      color: #006dae !important;
      text-align: right;
    }

    .logo-text {
      font-size: clamp(2rem, 4vw, 3.5rem);
    }
  </style>
</head>

<body>
  <form id="Order_record" enctype="multipart/form-data">
    <div class="form-group">
      <label for="description">Project Description</label>
      <textarea class="form-control" id="description" name="description" rows="1"></textarea>
    </div>
    <a href="#">Click Here for the Catelent Custom Online Digital Catelog</a>
    <div class="form-group">
      <input type="text" class="form-control" id="productnumber" name="product_number" placeholder="Enter the exact product number and product description here or keyword ex. Tote Bag">
    </div>
    <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="number" class="form-control" id="quantity" name="qauntity" placeholder="Enter the quantity of the products you require">
    </div>
    <div class="form-group">
      <label for="date">When do you need it</label>
      <input type="date" class="form-control" id="date" name="date" placeholder="Date">
    </div>
    <div class="form-group">
      <label for="logos">Logos<br>Click on the logo to select</label>
      <div><span class="logo-text">Catalent</span><input name="logos" type="radio" value="Catalent" ></div>
      <div><span class="logo-text">Catalent</span><span>BIOLOGICS</span><input name="logos" value="Catalent BIOLOGICS" type="radio"></div>
      <div><span class="logo-text">Catalent</span><span>BEALITY</span><input name="logos" value="Catalent BEALITY" type="radio"></div>
      <div><span class="logo-text">Catalent</span><span>CELL & GENE THERAPY</span><input name="logos" value="Catalent CELL & GENE THERAPY" type="radio"></div>
      <div><span class="logo-text">Catalent</span><span>DEVELOPMENT</span><input name="logos" value="Catalent DEVELOPMENT"  type="radio"></div>
      <div><span class="logo-text">Catalent</span><span>RP SCHERER</span> <input name="logos" value="Catalent RP SCHERER" type="radio"></div>
      <div><span class="logo-text">Catalent</span><span>ORAL TECHNOLOGIES</span><input name="logos" value="Catalent ORAL TECHNOLOGIES" type="radio"></div>
      <div><span class="logo-text">Catalent</span><span>INHALATION</span><input name="logos" value="Catalent INHALATION" type="radio"></div>
      <div><span class="logo-text">Catalent</span><span>CONSUMER HEALTH</span><input name="logos" value="Catalent CONSUMER HEALTH" type="radio"></div>
      <div><span class="logo-text">Catalent</span><span>CLINICAL SUPPLY</span><input name="logos" value="Catalent CLINICAL SUPPLY" type="radio"></div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">File Upload</label>
      <input type="file" class="form-control-file" name="logofile" id="logofile">
    </div>
    <div class="form-group">
      <label for="department">Department</label>
      <input type="text" class="form-control" id="department" name="department" placeholder="Enter here">
    </div>
    <div class="form-group">
      <label for="site">Site</label>
      <!-- <input type="text" class="form-control" id="site" name="site" placeholder="Enter here"> -->
      <select class="form-control" id="site" name="site" placeholder="Enter here">
        <option>--Select Site--</option>
        <option value="Anagni, Italy ,Località Fontana del Ceraso snc – S.P. 12 CASILINA N°41 , Anagni FR Italy 03012  Europe +39 0775 7621">Anagni, Italy ,Località Fontana del Ceraso snc – S.P. 12 CASILINA N°41 , Anagni FR Italy 03012  Europe +39 0775 7621</option>
      </select>
    </div>
    <div class="form-group">
      <label for="projectowner">Project Owner</label>
      <input type="text" class="form-control" id="projectowner" name="projectowner" placeholder="Enter here">
    </div>
    <div class="form-group">
      <label for="samplefile">Sample File Upload</label>
      <input type="file" class="form-control-file" name="samplefile" id="samplefile">
    </div>
    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="number" class="form-control" name="phone" id="phone">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" name="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
    </div>

    <div class="form-group form-check">
      <input type="checkbox" name="term" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label"  for="exampleCheck1">By checking the box you have agree below terms of conditions.</label>
      <span>below</span>
      <ol type="1">
        <li>An automated email will be generated back via email after submission.</li>
        <li>Any additional special request besides standard Catalent logos will require further approval
          from the Catalent Branding team</li>
        <li>A Formal presentation, quotation and art approval will be submitted via a Share Point link</li>
        <li>Approval of art and submission of Invoice payment will then be shared via Sharepoint link.</li>
        <li>Production timeline starts after both art approval + payment has been made.</li>
      </ol>
    </div>
    <button type="submit" id="save" class="btn btn-primary">Submit</button>
  </form>

   <!-- Trigger the modal with a button -->
   <button style="display:none;" type="button" class="btn btn-info btn-lg click" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p id="result">Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    
  </div>
</div>
</body>

<script>
  
 

  $("#Order_record").on("submit", function(e){
        e.preventDefault();

        let formData = new FormData(this);
        formData.append('action','insert');
        $.ajax({
          type: "POST",
          url: "helper.php",
          data: formData,
          contentType: false,
          processData: false,
          success: data=>{
            console.log(data);
            $('#result').html(data);
            $('.click').click();
              // if(data == true)
              // {
              //   alert("Upload Succesfully");
              // }
              // else{
              //   alert("Failed!!");
              // }
          }
        });
      });
</script>

</html>