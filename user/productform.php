<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Form</title>
  <?php include('../cdn/data-cdn.php'); ?>
  <link rel="stylesheet" href="../css/productform.css">
</head>

<body>
<?php include 'header.php'; ?>
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
              <label>Project Description</label>
             
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
        <a href="https://cdn.shopify.com/s/files/1/0061/3521/8249/files/Catalog_101721.pdf?v=1635183036" target="_blank" style="padding: 2rem 10px;font-weight: bold;">CLICK HERE FOR THE CATALENT CUSTOM ONLINE DIGITAL CATALOGUE</a>
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
              <input type="number" class="form-control" min="25" id="quantity" name="qauntity" placeholder="Enter the quantity of the products you want. Minimum quantity should be 25" required>

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
              <div><span class="logo-text">Catalent</span><input name="logos" type="radio" value="Catalent" checked ></div>
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
                <option value="Aprilia, Italy	Via Nettunense KM 20, 100	Aprilia	Italy	04011	Italy	+3906927141	+39069283593">Aprilia, Italy	Via Nettunense KM 20, 100	Aprilia	Italy	04011	Italy	+3906927141	+39069283593</option>
                <option value="Baltimore, MD	'801 West Baltimore Street">Baltimore, MD	'801 West Baltimore Street</option>
                <option value="Suite 302' Baltimore MD	21201 USA +1800-545-6569">Suite 302' Baltimore MD	21201 USA +1800-545-6569</option>
                <option value="Bathgate, Scotland 1 Inchwood Park Bathgate West Lothian EH48 2FY UK +441506813000 +441506813150">Bathgate, Scotland 1 Inchwood Park Bathgate West Lothian EH48 2FY UK +441506813000 +441506813150</option>
                <option value="Beinheim, France 74, Rue Principale Beinheim Alsace F-67930 France +33388633131	+33388862428">Beinheim, France 74, Rue Principale Beinheim Alsace F-67930 France +33388633131	+33388862428</option>
                <option value="Bloomington, IN	1300 S. Patterson Drive	Bloomington IN	47403 United States 812-355-6746 812-336-7167">Bloomington, IN	1300 S. Patterson Drive	Bloomington IN	47403 United States 812-355-6746 812-336-7167</option>
                <option value="Bolton, UK Lancaster Way, Wingates Industrial Park Westhoughton	Bolton	BL5 3XX	UK +4401942790000 +4401942799799">Bolton, UK Lancaster Way, Wingates Industrial Park Westhoughton	Bolton	BL5 3XX	UK +4401942790000 +4401942799799</option>
                <option value="Boston, MA 190 Everett Ave Chelsea MA 02150 USA	+1617-660-4110">Boston, MA 190 Everett Ave Chelsea MA 02150 USA	+1617-660-4110	</option>
                <option value="Brussels, Belgium Rue Font St Landry 10 Parc Mercator Neder Over Hembeek Belgium B-1120	Belgium	+3227885000 +3227883959">Brussels, Belgium Rue Font St Landry 10 Parc Mercator Neder Over Hembeek Belgium B-1120	Belgium	+3227885000 +3227883959</option>
                <option value="Buenos Aires, Argentina	Av Marquez 691/1657 Villa Loma Hermosa	Buenos Aires Argentina	+541140088400 +541140088433">Buenos Aires, Argentina	Av Marquez 691/1657 Villa Loma Hermosa	Buenos Aires Argentina	+541140088400 +541140088433</option>
                <option value="Cham, Switzerland Riedstrasse 1	Cham Switzerland CH-6330 Switzerland +41417474250">Cham, Switzerland Riedstrasse 1	Cham Switzerland CH-6330 Switzerland +41417474250</option>
                <option value="Dartford, UK Crossways Blvd. Crossways 	Dartford Kent DA26QY UK	+44(0)1322425200 +44(0)1322 425201">Dartford, UK Crossways Blvd. Crossways 	Dartford Kent DA26QY UK	+44(0)1322425200 +44(0)1322 425201</option>
                <option value="Eberbach, Germany Gammelsbacher Strasse 2 Eberbach Germany 69412 Germany +4962719450 +4962719453701">Eberbach, Germany Gammelsbacher Strasse 2 Eberbach Germany 69412 Germany +4962719450 +4962719453701</option>
                <option value="Emeryville, CA 5959 Horton Street-Suite 400">Emeryville, CA 5959 Horton Street-Suite 400</option>
                <option value="Emeryville CA 94608 USA	+1510-735-0540	+1510-291-9100">Emeryville CA 94608 USA	+1510-735-0540	+1510-291-9100</option>
                <option value="Gaithersburg, MD 20 Firstfield Road Gaithersburg MD 20878 USA +1240-268-2000">Gaithersburg, MD 20 Firstfield Road Gaithersburg MD 20878 USA +1240-268-2000</option>
                <option value="Gosselies, Belgium 48, Rue Auguste Piccard Gosselies Belgium 6041 +32071347629">Gosselies, Belgium 48, Rue Auguste Piccard Gosselies Belgium 6041 +32071347629</option>
                <option value="Harmans/BWI, MD	7555 Harmans Road Harmans MD 21077 USA +1800-545-6569">Harmans/BWI, MD	7555 Harmans Road Harmans MD 21077 USA +1800-545-6569</option>
                <option value="Haverhill, UK 37 Hollands Road">Haverhill, UK 37 Hollands Road</option>
                <option value="Haverhill England CB98PB UK +44(0)1440826318">Haverhill England CB98PB UK +44(0)1440826318</option>
                <option value="Houston, Texas 	253 West Medical Center Blvd Webster Texas 77598 346-458-9612">Houston, Texas 	253 West Medical Center Blvd Webster Texas 77598 346-458-9612</option>
                <option value="Indaiatuba, Brazil Av. Jose Vieira, 446-Distrito In. Domingos Giomi Indaiatuba	Brazil	13347-360 Brazil +551939369199	+551939369199">Indaiatuba, Brazil Av. Jose Vieira, 446-Distrito In. Domingos Giomi Indaiatuba	Brazil	13347-360 Brazil +551939369199	+551939369199</option>
                <option value="Kakegawa, Japan	1656 Kurami Kakegawa.shi Japan	436-0341 Japan	+81537291131 +81537291455">Kakegawa, Japan	1656 Kurami Kakegawa.shi Japan	436-0341 Japan	+81537291131 +81537291455</option>
                <option value="Kansas City, MO	10245 Hickman Mills Drive Kansas City MO 64137	USA +18167676000 +18167673950">Kansas City, MO	10245 Hickman Mills Drive Kansas City MO 64137	USA +18167676000 +18167673950</option>
                <option value="Limoges, France	Z.I. Nord Rue de Dion Bouton Limoges France BP 1547 France +33555046300 +33555377454">Limoges, France	Z.I. Nord Rue de Dion Bouton Limoges France BP 1547 France +33555046300 +33555377454</option>
                <option value="Madison, WI 726 Heartland Trail	Madison	WI 53717 USA +1608-824-9920 +1608-824-9930">Madison, WI 726 Heartland Trail	Madison	WI 53717 USA +1608-824-9920 +1608-824-9930</option>
                <option value="Malvern, PA 333 Phoenixville Pike Malvern PA 19355 USA +1610-251-7400 +1610-251-7499">Malvern, PA 333 Phoenixville Pike Malvern PA 19355 USA +1610-251-7400 +1610-251-7499</option>
                <option value="Montevideo, Uruguay Dr. Luis Bonavita 1294 WTC Free Zone - Office 407 Montevideo Uruguay 11300 Uruguay +59826262044 +59826262053">Montevideo, Uruguay Dr. Luis Bonavita 1294 WTC Free Zone - Office 407 Montevideo Uruguay 11300 Uruguay +59826262044 +59826262053</option>
                <option value="Morrisville, NC	160 Pharma Drive Morrisville NC 27560 USA +19194814855	+19194814908">Morrisville, NC	160 Pharma Drive Morrisville NC 27560 USA +19194814855	+19194814908</option>
                <option value="Nottingham, UK	8 Orchard Place Nottingham Business Park Nottingham NG86PX UK +44(0)1158718888">Nottingham, UK	8 Orchard Place Nottingham Business Park Nottingham NG86PX UK +44(0)1158718888</option>
                <option value="Philadelphia, PA 3031 Red Lion Road Philadelphia PA 19154 USA +12155011210 +12155011200">Philadelphia, PA 3031 Red Lion Road Philadelphia PA 19154 USA +12155011210 +12155011200</option>
                <option value="Rockville, MD	9920 Belward Campus Drive Rockville MD 20850 USA +1240-268-2000">Rockville, MD	9920 Belward Campus Drive Rockville MD 20850 USA +1240-268-2000</option>
                <option value="San Diego, CA	7330 Carroll Road, Suite 200 San Diego CA 92121 United States +1858-805-6383	+1858-578-0403">San Diego, CA	7330 Carroll Road, Suite 200 San Diego CA 92121 United States +1858-805-6383	+1858-578-0403</option>
                <option value="Schorndorf, Germany Steinbeisstrasse 1-2,Schorndorf Germany D-73614 Germany +49718170000 +4971817000100">Schorndorf, Germany Steinbeisstrasse 1-2,Schorndorf Germany D-73614 Germany +49718170000 +4971817000100</option>
                <option value="Shanghai, China	Section C, Building 10, No. 353 North-Riying Road Waigaoqiao Free Trade Zone Shanghai China +862122851000 +862152996757">Shanghai, China	Section C, Building 10, No. 353 North-Riying Road Waigaoqiao Free Trade Zone Shanghai China +862122851000 +862152996757</option>
                <option value="Shiga, Japan 35 Minakuchicho Hinokigaoka Koka Shiga 528-0068 Japan">Shiga, Japan 35 Minakuchicho Hinokigaoka Koka Shiga 528-0068 Japan</option>
                <option value="Singapore Pte Ltd., No.1, Jalan Kilang, #02-01/02 Dynasty Industrial Building Singapore	159402	Singapore +65 62711891	+65 62711830">Singapore Pte Ltd., No.1, Jalan Kilang, #02-01/02 Dynasty Industrial Building Singapore	159402	Singapore +65 62711891	+65 62711830</option>
                <option value="Somerset, NJ 14 Schoolhouse Road Somerset NJ 08873 USA	+17325376200 +17325376480">Somerset, NJ 14 Schoolhouse Road Somerset NJ 08873 USA	+17325376200 +17325376480</option>
                <option value="Sorocaba, Brazil Avenida Jerome Case 1277 Sorocaba Brazil 18087-220 Brazil +551532353513 +551532252036">Sorocaba, Brazil Avenida Jerome Case 1277 Sorocaba Brazil 18087-220 Brazil +551532353513 +551532252036</option>
                <option value="St. Petersburg, FL 2725 Scherer Drive North St. Petersburg FL 33716 USA +17278032100 +17278031639">St. Petersburg, FL 2725 Scherer Drive North St. Petersburg FL 33716 USA +17278032100 +17278031639</option>
                <option value="Strathroy, Ontario 720 Wright Street Strathroy Ontario N7G 3H8 Canada +1519-969-5404 +1519-969-7378">Strathroy, Ontario 720 Wright Street Strathroy Ontario N7G 3H8 Canada +1519-969-5404 +1519-969-7378</option>
                <option value="Swindon, UK Frankland Road Swindon England SN5 8RU UK +4401793864000 +44 1793 548340">Swindon, UK Frankland Road Swindon England SN5 8RU UK +4401793864000 +44 1793 548340</option>
                <option value="Tokyo, Japan 4-9-17 Akasaka Minato-ku Tokyo 107-0052 Japan +81334702311	+81334085554">Tokyo, Japan 4-9-17 Akasaka Minato-ku Tokyo 107-0052 Japan +81334702311	+81334085554</option>
                <option value="Winchester, KY	1100 Enterprise Drive Winchester KY 40391 USA +18597452200 +18597456636">Winchester, KY	1100 Enterprise Drive Winchester KY 40391 USA +18597452200 +18597456636</option>
                <option value="Windsor, Ontario 2125 Ambassador Drive	Windsor	Ontario	N9C 3R5	Canada	+1519-969-5404	+1519-969-7378">Windsor, Ontario 2125 Ambassador Drive	Windsor	Ontario	N9C 3R5	Canada	+1519-969-5404	+1519-969-7378</option>
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
              <input type="number" class="form-control" name="phone" required id="phone">
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
              <input type="email" required class="form-control" id="exampleInputEmail1" name="InputEmail" aria-describedby="emailHelp" placeholder="Enter email">
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
                <input type="checkbox" name="term" class="form-check-input" id="term" required>
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
   <button style="display:none;" type="button" class="btn btn-info btn-lg modal-btn" data-toggle="modal" data-target="#myModal">Open Modal</button>

<!-- Modal -->
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Order Status & Details</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <p id="result"></p>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
</body>

<script>

function convert(str) {
  var date = new Date(str),
    mnth = ("0" + (date.getMonth() + 1)).slice(-2),
    day = ("0" + date.getDate()).slice(-2);
  return [date.getFullYear(), mnth, day].join("-");
}


  
  $(function(){
    // Initialize select2
    $("#site").select2();
    var inputDate = new Date();
    var newdate=inputDate.setDate( inputDate.getDate() + 21);
    // alert(convert(newdate));
    $('#date').attr('min', convert(newdate));

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
          beforeSend: function(){
             $("#save").text("Submitting Your request");
          },
          success: data=>{
            console.log(data);
            $('#result').html(data);
            $('.modal-btn').click();
            $("#save").text("Submit Request");
          }
        });
       
      });
});
 

  
</script>

</html>