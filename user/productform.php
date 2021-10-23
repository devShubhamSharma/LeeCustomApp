<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <?php include('../cdn/data-cdn.php'); ?>
  <style>
   .form-box * {
      color: #5f7e86;
    }
    .logosFlex * {
	color: #006dae !important;
	font-size: 13px;
}
    .logo-text {
	font-size: clamp(1rem, 4vw, 1.5rem);
}
.col-md-3 label {
	font-weight: bold;
}
    .leeForm {
    max-width: 90%;
    margin: 2rem auto;
    border: 1px solid;
    }
    .form-group {
	margin-bottom: 15px;
	grid-template-columns: 1fr 3fr;
	border-top: 1px solid;
	border-bottom: 1px solid;
	align-items: center;
}
.form-group label {
	padding: 10px;
	margin: 0;
}

.border_bottom{
  border-bottom: 1px solid #000;
}
.form-box {
	margin: 2rem .5rem;
}
.form-box p {
	margin: 0;
}
/**  css start ***/ 
.form-box-content {
    border: 1px solid #000;
}
/* .right-border{
  border-right: 1px solid #000;
} */
.form-group{

  height: 100%;
  border: 1px solid;
  margin-bottom: 0;
  padding: 2px 5px;
  display: flex;
flex-flow: column;
align-items: flex-start;
justify-content: center;
}
.form-control {
	border-radius: 0;
	border: 1px solid;
}
.btn-box{
  justify-content: flex-end !important;
align-content: end;
flex-flow: unset!important;

}
.logosFlex {
	display: flex;
	flex-wrap: wrap;
}
.logosFlex > * {
	flex: 1 1 15rem;
	display: flex;
	flex-direction: column;
	justify-content: center;
	align-items: center;
}
#logofile {
	margin-top: 2rem;
	padding-bottom: .6rem;
}
  </style>
</head>

<body>
<div class="form-box">
   <div class="row">
     <div class="container">
       <div class="form-box-content">
        <div class="form-container-outer">
          <form id="Order_record" enctype="multipart/form-data">
          <!--------new row start -->
        <div class="row ">
          <div class="col-md-12 ">
      
            <div class="form-group ">
              <p style="
                padding: 10px;
                font-weight: bold;
                text-transform: uppercase;
                letter-spacing: 1px;color: #111;
              ">Custom Order</p>
            </div>
          </div>
      
        </div>
          <!--------new row end -->
          <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group ">
              <label>Project Discription</label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group ">
              <textarea class="form-control" id="description" name="description" rows="1"></textarea>
            </div>
          </div>
        </div>
          <!--------new row end -->
          <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0 ">
            <div class="form-group r"></div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group " style="align-items: center; padding: 0;">
        <a href="#" style="padding: 2rem 10px;font-weight: bold;">CLICK HERE FOR THE CATALENT CUSTOM ONLINE DIGITAL CATALOGUE</a>
        <div style="
        border-top: 1px solid;
        padding: 4px;
        width: 100%;">
        <input type="text" class="form-control" id="productnumber" name="product_number" placeholder="Enter the exact product number and product description here or keyword ex. Tote Bag">
      </div>
            </div>
            
          </div>
        </div>
      
      <!--------new row end -->
        <!--------new row start -->
         <div class="row">
          <div class="col-md-3 pr-md-0 ">
            <div class="form-group">
              <label>* Quantity</label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group ">
              <input type="number" class="form-control" min="25" id="quantity" name="qauntity" placeholder="Enter the quantity of the products you require">

            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
      
      
      
         <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group ">
              <label>When do you need it </label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group ">
              <input type="date" class="form-control" id="date" name="date" placeholder="Date">
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
          <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group  " style="justify-content: space-between;">
             <div class="info-text">
              <label>* Logos </label><br>
              <span>Click on the logo to select</span>
             </div> 
             <label>File Upload </label>
            
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            
            <div class="form-group">
              <div class="logosFlex">
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
              <input type="file" class="form-control-file" name="logofile" id="logofile">
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
             <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group right-border">
              <label>Department </label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group">
              <input type="text" class="form-control" id="department" name="department" placeholder="Enter here">
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
           <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group right-border">
              <label>Site </label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group">
              <select class="form-control" id="site" name="site" placeholder="Enter here">
                <option>--Select Site--</option>
                <option value="Anagni, Italy ,Località Fontana del Ceraso snc – S.P. 12 CASILINA N°41 , Anagni FR Italy 03012  Europe +39 0775 7621">Anagni, Italy ,Località Fontana del Ceraso snc – S.P. 12 CASILINA N°41 , Anagni FR Italy 03012  Europe +39 0775 7621</option>
              </select>
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
           <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group right-border">
              <label>Project Owner </label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group">
              <input type="text" class="form-control" id="projectowner" name="projectowner" placeholder="Enter here">
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
            <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group right-border">
              <label>Sample File Upload  </label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group">
              <input type="file" class="form-control-file" name="samplefile" id="samplefile">
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
            <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group right-border">
              <label>*Phone Number </label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group">
              <input type="number" class="form-control" name="phone" id="phone">
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
           <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group right-border">
              <label>*Email Address </label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group">
              <input type="email" class="form-control" id="exampleInputEmail1" name="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
        <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-3 pr-md-0">
            <div class="form-group right-border" style="justify-content: flex-start;">
              <label>Disclaimer</label>
             
            </div>
          </div>
          <div class="col-md-9 pl-md-0">
            <div class="form-group">
              <div class="form-check">
                <div style="display: flex; align-items: center;">
                <input type="checkbox" name="term" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  By checking this box you have agree below terms of condition
                </label>
              </div>
                <ol type="1">
                  <li>An automated email will be generated back via email after submission.</li>
                  <li>Any additional special request besides standard Catalent logos will require further approval
                    from the Catalent Branding team</li>
                  <li>A Formal presentation, quotation and art approval will be submitted via a Share Point link</li>
                  <li>Approval of art and submission of Invoice payment will then be shared via Sharepoint link.</li>
                  <li>Production timeline starts after both art approval + payment has been made.</li>
                </ol>
              </div>
            </div>
          </div>
        </div>
      
        <!--------new row end -->
        <!--------new row start -->
          <!--------new row end -->
        <!--------new row start -->
        <div class="row">
          <div class="col-md-12">
            <div class="form-group d-flex justify-content-end btn-box">
            <button type="submit" id="save" class="btn btn-primary" style="color: #fff;">Submit Request</button>
          </div>
          </div>
         
        </div>
      </form>
      
        <!--------new row end -->
        <!--------new row start -->
      </div>
       </div>
     </div>
   </div>
 </div>

   <!-- Trigger the modal with a button -->
   <button style="display:none;" type="button" class="btn btn-info btn-lg click" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
  <div class="modal-dialog">
  
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Order Status</h4>
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