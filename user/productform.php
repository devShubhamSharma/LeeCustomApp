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
  <form>
    <div class="form-group">
      <label for="description">Project Description</label>
      <textarea class="form-control" id="description" rows="1"></textarea>
    </div>
    <a href="">Click Here for the Catelent Custom Online Digital Catelog</a>
    <div class="form-group">
      <input type="text" class="form-control" id="productnumber" placeholder="Enter the exact product number and product description here or keyword ex. Tote Bag">
    </div>
    <div class="form-group">
      <label for="quantity">Quantity</label>
      <input type="number" class="form-control" id="quantity" placeholder="Enter the quantity of the products you require">
    </div>
    <div class="form-group">
      <label for="date">When do you need it</label>
      <input type="date" class="form-control" id="date" placeholder="Date">
    </div>
    <div class="form-group">
      <label for="date">Logos</label>
      <div><span class="logo-text">Catalent</span><input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>BIOLOGICS</span><input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>BEALITY</span><input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>CELL & GENE THERAPY</span><input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>DEVELOPMENT</span><input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>RP SCHERER</span> <input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>ORAL TECHNOLOGIES</span><input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>INHALATION</span><input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>CONSUMER HEALTH</span><input type="checkbox"></div>
      <div><span class="logo-text">Catalent</span><span>CLINICAL SUPPLY</span><input type="checkbox"></div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlFile1">File Upload</label>
      <input type="file" class="form-control-file" id="logofile">
    </div>
    <div class="form-group">
      <label for="department">Department</label>
      <input type="text" class="form-control" id="department" placeholder="Enter here">
    </div>
    <div class="form-group">
      <label for="site">Site</label>
      <input type="text" class="form-control" id="site" placeholder="Enter here">
    </div>
    <div class="form-group">
      <label for="projectowner">Project Owner</label>
      <input type="text" class="form-control" id="projectowner" placeholder="Enter here">
    </div>
    <div class="form-group">
      <label for="samplefile">Sample File Upload</label>
      <input type="file" class="form-control-file" id="samplefile">
    </div>
    <div class="form-group">
      <label for="phone">Phone Number</label>
      <input type="number" class="form-control" id="phone">
    </div>
    <div class="form-group">
      <label for="exampleInputEmail1">Email address</label>
      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">By checking the box you have agree below terms of conditions.</label>
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
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</body>

</html>