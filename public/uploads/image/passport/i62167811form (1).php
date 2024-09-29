<?php 

session_start();
//  header( "refresh:5;url=http://loan.krtouristservices.com/" );


?>
<!DOCTYPE html>
<html>
   <head>
      <title>Form</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <?php 
    include ('filelink.php'); 
    include('favicon.php');
     ?>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="plugin/select2/css/select2.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    
    
    <script>
        // puhupwas added pincode number limitation at 6 of 
            $(document).ready(function(){
            $('input#pincode').attr('maxLength','6').keypress(limitMe);
            
            function limitMe(e) {
                if (e.keyCode == 8) { return true; }
                return this.value.length < $(this).attr("maxLength");
            }
            });
        // puhupwas added pincode number limitation at 6 of  ends
    </script>


<style>
/*//p added css*/
    /*.testid{*/
    /*    width:100% !important;*/
    /*}*/
    
    #logopadding{
        padding-left:6%
    }
    
    .select2-selection:focus{
        color: #495057;
    background-color: #fff;
    border-color: #80bdff;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgba(0,123,255,.25);
    height: 37px;
    }
    
</style>


   </head>
   
   <body class="lagend-body">
       <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-sm-1 col-md-12" id="logopadding">
                <div class="absolute-div">
               <a href="https://legendcall.com/"><img src="images/LegendCall-Logo-Final.png" width="100" height="95"></a>
            </div>
        </div>
       
            
   
               
               
               
        <div class="col-12 col-xs-12">
            <div class="row">
            
            <div class="col-md-12">  
            
   
            <div class="main-div">
            <div class="form-div">
                
                         

                
                
            <form action="php/vendor-payment.php" method="POST">
                
                   <h2 class="heading main-heading" style="padding-top: 22px !important;">Vendor Registration Form</h2>
               <!--<h5 class="heading show-msg" style="font-size:20px; display: none;"></h5>-->
               
               
             
               
                
                <div class="back-link">
                <a href="https://legendcall.com/"><img src="images/return.png" width="25" height="25" style="margin-bottom:5px"> Back To Homepage</a>
                </div>
                                                <div class="form-group">
                                                        
                                                        <div class="col-md-12">
                                                                <input type="text" name="companyName" class="form-control populate select2-offscreen " id="companyName"   required placeholder="Company Name"> 
                                                                <!-------p-->
                                    <span class="error"></span>
                                                        </div>
                                                    </div>
                                                     <div class="form-group">
                                                       
                                                        <div class="col-md-12">
                                                                <input type="text" class="form-control populate select2-offscreen" name="person_name" id="contact_person"   required placeholder="Person Name">
                                                                                                                                                                <!--puhupwas required-->
                                                                <span class="error"></span>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                                <input type="text" class="form-control populate select2-offscreen" name="address" id="address"    required placeholder="House no/Street no">
                                                                                                                        <!--puhupwas required-->
                                                               
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" style=" margin-bottom: 0px; ">
                                                        <div class="form-group col-md-5" style=" margin-bottom: 25px;padding-right:0 ">
                                                       
                                                          <div class="col-md-12">
                                                                <?php
                                                                include("dashboard/conn.php");
                                                                $state_qry = mysqli_query($conn,"SELECT * FROM `tb_state` ORDER BY `state_name` ASC");
                                                                ?>                                                            
            
                                                                        <select class="form-control select2 select2-hidden-accessible populate select2-offscreen"  data-select2-id="9" aria-hidden="true" name="state" id="state" onchange="showDistrict(this.value)" >
                                                                            
                                                                            <!----puhupwas-->
                                                                            <option value="">State</option>
                                                                            <?php 
                                                                            foreach($state_qry as $sq){
                                                                            ?>
                                                                            <option value="<?php echo $sq['state_name'] ?>"><?php echo $sq['state_name'] ?></option>
                                                                            <?php } ?>
                                                                        </select>
                                                                <!--<input type="text" class="form-control populate select2-offscreen" name="state" id="state" required>-->
                                                               
                                                            </div>
                                                        </div>
                                                    
                                                        <div class="form-group col-md-4" style=" margin-bottom: 25px; ">
                                                       
                                                            <div class="col-md-12">
                                                                                               
                                                            <select class="form-control select2 select2-hidden-accessible populate select2-offscreen"  data-select2-id="10" aria-hidden="true" required name="district" id="district" >
                                                                               <!--puhupwas required removed            -->
                                                               <option value="">District</option>
                                                            </select>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="form-group col-md-3" style=" margin-bottom: 25px; padding-left:0;">
                                                       
                                                            <div class="col-md-12">
                                                                                               
                                                                <input type="number" class="form-control populate select2-offscreen" name="pincode" id="pincode"   required placeholder="PIN Code">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                            <div class="form-group row">
                                                        
                                                        <div class="col-md-6">
                                                            <div class="col-md-12">
                                                                <Select name="offc_type" class="form-control populate select2-offscreen " onchange="officeType()" id="offc_type" >
                                                                                                                                <!--puhupwas -->
                                                                    <option value="" >Office Type</option>                
                                                                    <!--<option value="Office Type" disabled="disabled">Office Type</option>                -->
                                                                    <option value="Head-office">Head-office</option>
                                                                    <option value="Branch">Branch</option>
                                                                                            
                                                                </select>
                                                                <span class="error"></span>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-6">
                                                            <div class="col-md-12">
                                                                <Select name="vendorType" class="form-control populate select2-offscreen "  id="vendorType" >
                                                                                                                                                <!--puhupwas vendorType() not created yet        -->
                                                                    <option value="" >Vendor Type</option>                
                                                                        <!--<option value="Office Type" disabled="disabled">Office Type</option> -->
                                                                    <option value="Standerd Vendor" amount="40">Standard Vendor</option>
                                                                    <option value="Priority Vendor" amount="50">Priority Vendor</option>
                                                                    
                                                                </select>
                                                                  <span class="error"></span>
                                                             </div>
                                                        </div>
                                                        
                                                        
                                            </div>
                                                    
                                                     
                                                    <div class="form-group">
                                                       
                                                        <div class="col-md-12">
                                                               
                                                                <select class="form-control populate select2-offscreen" name="user-license"  required id="user-license" >
                                                                                                                                            <!--// puhupwas userLicense method created-->
                                                                     <option value="" >User-License</option>
                                                                     <!--<option value="">None</option>-->
                                                                     <option value="0-10">0-10</option>
                                                                     <option value="10-20">10-20</option>
                                                                     <option value="20-50">20-50</option>
                                                                     <!--<option value="50-above">50-above</option>-->
                                                                 </select>
                                                              
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                       
                                                        <div class="col-md-12">
                           
                                                                <select id="first_level" name="first_level[]" multiple class="form-control"   required placeholder="Category">
                                                                            <!--puhupwas required-->
                                                                                    <?php
                                                                    
                                                                     $cat_qry =mysqli_query($conn,"SELECT * FROM `category`");
                                                                                  foreach($cat_qry as $cq){
                                                                               
                                                                            ?>
                                                                 
                                                                 <option value="<?php echo $cq["name"] ?>"><?php echo $cq['name'] ?></option>
                                                                 
                                                                                       <?php } ?>                                     
                                                                </select>
                                                              <span id="categoryerror" style="color:red;"></span>
                                                        </div>
                                                          
                                                    </div>
                                                
                                  
                                   
                                         
                                                      <div class="form-group" id="selectedcetegory">
                                                        
                                                        <div class="col-md-12">
     
                                                         <select id="second_level" name="second_level[]" multiple class="form-control">
                                                         </select>
                                                    
                                                        </div>
                                                      </div>   
                                                          
                                                          
                                                                                
                                                   
                                                    
                                                   
                                                    
                                                    
                                                 
                                                   
                                                    <div class="row">
                                                      <div class="form-group col-md-12">
                                                        <div class="col-md-12">
                                                                <select class="form-control populate select2-offscreen" name="computer" required id="computer" >
                                                                                                                        <!--puhupwas required-->
                                               <option value="">Do You Have Computer For All Users</option>
                                                         <option value="Yes">Yes</option>
                                                         <option value="No">No</option>
                                                    
                                                                </select>
                                                              
                                                        </div>
                                                    </div>
                                                    
                                                    
                                                      <div class="form-group col-md-12">
                                                        
                                                        <div class="col-md-12">
                                                                <select class="form-control populate select2-offscreen" name="internet" required id="internet" >
                                                                                                                            <!--puhupwas required-->
                                               <option value="">All Computers Have Internet Connection</option>
                                                         <option value="Yes">Yes</option>
                                                         <option value="No">No</option>
                                                    
                                                                </select>
                                                              
                                                        </div>
                                                    </div>
                                                    </div>
                                                    
                                                   
                                
                                                
                                



                                     <div class="row" style=" margin-bottom: -15px; ">
                                                        <div class="form-group col-md-6">
                                                            
                                                            <div class="col-md-12">
                                                                    <input type="tel" class="form-control populate select2-offscreen" name="mobile" required placeholder="Contact No (Mobile Only)" id="mobile"  onkeypress="if(this.value.length == 10) return false" onkeyup="validateNum()">
                                                                    <span class="error my-error"></span>
                                                            </div>
                                                        </div>
                                                        
                                            <div class="form-group col-md-6">
                                                <div class="row">
                                                <div class="form-group col-12 col-md-6 my-padding">
                                                    <input type="button" class="btn mybtn verify-button" id="verify-button" onclick="verifyPhone()" style="font-size:14px;margin: 0px 0px 0px 0px;" value="Send OTP">
                                                </div>
                                            
                                                    <div class="form-group col-12 col-md-6 my-padding" style="padding-left:0;">
                                                                      
                                                                    <div class="col-md-12" style="padding-left:0;">
                                                                            <input type="text" class="form-control populate select2-offscreen" name="otp" id="otp"   required placeholder="OTP" onkeyup="validateOTP(this.value)">
                                        
                                                                                                                                                   
                                                                            
                                                                   
                                                                    </div> 
                                                                    
                                                                    
                                                                     <span class="otp-error"></span>
                                 
                                                    </div>
                                                </div>
                                            </div>
                                   </div>
                                               
                                                <div class="form-group">
                                                           
                                                            <div class="col-md-12">
                                                                    <input type="text" class="form-control populate select2-offscreen" name="alt_mobile" id="alt_mobile"   placeholder="Alternate Contact No">
                                                                    <span class="error"></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                           
                                                                <div class="col-md-12">
                                                                    <input type="email" class="form-control populate select2-offscreen" name="email" id="email"  required placeholder="Email ID">
                                                                                                                                                    <!--puhupwas required-->
                                                                    <span class="error"></span>
                                                                </div>
                                                         </div>

  <span id="otp-span"></span>
                                                        
                                                    <div class="form-group">
                                                        
                                                        <div class="col-md-12">
                                                            <select class="form-control populate select2-offscreen" name="reference_type" id="reference_type" onchange="showDrop(this.value)"   required placeholder="Reference Type">
                                                                                                                                                                <!--puhupwas required-->
                                                                 <option value="">Reference Type</option>
                                                                 <option value="Social-Media">Social Media</option>
                                                                 <option value="Legend-Call-Employee">LegendCall Employee</option>
                                                                 <option value="Newsletter">Newsletter</option>
                                                    
                                                            </select>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group reference_name_div">
                                                    </div>
                                                    
                                                    <div class="form-group">
                                                          <div class="col-md-12">
                                                               <select class="form-control" name="transaction-type" onchange="showAmountField(this.value)" id="transactionType">
                                                                  <option value="">Payment Type</option>   
                                                                  <option value="KYC charges">KYC Charges</option>
                                                                  <option value="subscription charges" selected>Subscription Charges</option>                               
                                                               </select>
                                                          </div>
                                                    </div>
                                                    
                                                    <div class="form-group" id="subCharges" style="display:non">
                                                          <div class="col-md-12">
                                                               <select class="form-control"  name="transaction-type" onchange="subscriptionDuration2(this.value)" id="subscription-duration">
                                                                  <option value="">Subscription Duration</option>                               
                                                                  <option value="1">Monthly</option>                               
                                                                  <option value="3">Quarterly</option>                               
                                                                  <option value="6">Half Yearly</option>                               
                                                                  <option value="12">Yearly</option>                               
                                                               </select>
                                                          </div>
                                                    </div>
                                                    
                                                    <div class="form-group amount-div">
                                                    </div>
                                                
                                                    <div class="form-group total-amount-div">
                                                      
                                                      
                                        <div class="col-md-12 total-a" style="display:flex">
            <span style="padding-top:7px;width:50px">INR &#8377;</span>
            <input type="hidden" name="total_amount" value="500">
            <input type="number" value="500" class="form-control" disabled  id ="total_amount2">
        </div>              
                                                      
                                                      
                                                        <div class="col-md-12 total-b">
    <h6>Tax : 18% GST</h6>
    <h6>Grand Total</h6>
    <div style="display:flex">
     <span style="padding-top:7px;width:50px">INR &#8377;</span>
     <input type="hidden" name="total_amount" value="${totalamount}">
    <input type="number" class="form-control"  id="total_amount" value="${totalamount}" disabled>
    </div>
    </div>
                                                    </div>
                                          


                                                         <div class="form-group">
                                                         <label class="col-md-3 control-label"></label>
                                                         <div class="col-md-12" style="text-align:center">
                                                                   <input type="submit" name="submit" class="btn mybtn" style="margin-bottom:20px">
                                                                    </div>
                                                         </div>
                                                         
                                                          
                                
                                                </form>
                                                </div> 
           </div>
           </div>
            </div>
        </div>
        </div>
        
        
                     <!------puhupwas -->
               
               
 <div class="modal fade show-slide-modal" id="showSlide" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
       <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display:flex;border:1px; margin-top:auto;margin-bottom:auto;">
                    <h4 class="modal-title" id="exampleModalLongTitle" style="text-align:center;marign-right:auto;margin-left:auto;">Client Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align:center;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                      <div style="display:flex">
                      <div id="modal-show-id"  style="border:1px solid #c1c1c1;text-align:center;font-size:20px;width:577px;height:200px;font-weight:600;box-sizing: border-box;padding:5% ;">
                          
                      </div>
                    
                      </div>
                    
                </div>
                 <div class="modal-footer"  >
                     <!--style="background-image: linear-gradient(#a1e3f0 ,#2ebcd9 );"-->
               <!--<a href="https://legendcall.com/" style="margin-right:0px">-->
                   <button type="button" class="btn" id="okinmodal"   style="background-color:#0694c5;">Ok</button>
                <!--</a>-->
                <button type="button" class="btn " data-dismiss="modal" style="background-color:#0694c5;">Close</button>
            </div>
            </div>
           
        </div>
</div>


        
        <!-- <div class="modal-dialog modal-dialog-centered" role="document">-->
        <!--  <div class="modal-content">-->
          
        <!--    <div class="modal-header"> -->
        <!--      <h4 class="modal-title" id="exampleModalLongTitle" style="text-align:center">Client Details</h4>-->
        <!--      <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin-top:-20px">-->
        <!--        <span aria-hidden="true">&times;</span>-->
        <!--      </button>-->
        <!--    </div>-->
        <!--    <div class="modal-body">-->
        <!--    <div style="display:flex">-->
        <!--      <div style="text-align:right;font-size:15px;width: 277px;font-weight:600">-->
        <!--    <p>First Name : </p>-->
        <!--    <p>Last Name : </p>-->
        <!--    <p>Contact No : </p>-->
        <!--    <p>Email id : </p>-->
        <!--    <p>Annual Income : </p>-->
        <!--    <p>Profession : </p>-->
        <!--      </div>-->
        <!--      <div style="text-align:left;font-size:15px">-->
        <!--    <p>&nbsp;<?php echo $fetch['first_name'] ?></p>-->
        <!--    <p>&nbsp;<?php echo $fetch['last_name'] ?></p>-->
        <!--    <p>&nbsp;<?php echo $fetch['mobile_number'] ?></p>-->
        <!--    <p>&nbsp;<?php echo $fetch['email_id'] ?></p>-->
        <!--    <p>&nbsp;<?php echo $fetch['yearly_income'] ?></p>-->
        <!--    <p>&nbsp;<?php echo $fetch['profession'] ?></p>-->
        <!--      </div>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--    <div class="modal-footer">-->
        <!--      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
        <!--    </div>-->
            
        <!--  </div>-->
        <!--</div>-->
     
             <!----puhupwas end----->    
        
        
        
         </div>
         <script src="plugin/select2/js/select2.full.min.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
         
         
         
         
         
         
         
         
         
         
         
         
         <script>
         let byselecteddata = null;
      $(document).ready(function(){
      $('#first_level, #vendorType, #user-license, #second_level').change(function(event){  
          
          var selected = $('#first_level').val()
          
          var vendor_type = $('#vendorType').val()
        var user_licensee = $('#user-license').val()
        var second_level = $('#second_level').val()
          nonSelectedText:'Select Category',

     $.ajax({
      url:"dashboard/ajax/get_data_vendor_offer.php",
      method:"get",
      data:{category:selected,vendor_type:vendor_type,user_licensee:user_licensee,second_level:second_level},
      success:function(data)
      {
        //   document.getElementById('subscription-duration').remove;
          $('#subscription-duration option:first').prop('selected',true);
                        document.querySelector(".total-amount-div .total-b").style.display="block";
       document.getElementById('amount').value = data;  
       byselecteddata = data;
       
        calculateGST(data);  
       
      }
    
      });             
                 
                 
             })
             })
         </script>
         
         
         
         
<script>  

// -----p----  
// $(document).ready(function(){
//   $('input[name=submit]').submit(function(){
//      $('#showSlide').modal('show');
//   });
// });

// -----p----  end


    $(document).ready(function(){

 $('#first_level').multiselect({
  nonSelectedText:'Select Category',
  buttonWidth:'100%',
  onChange:function(option, checked){
   $('#second_level').html('');
   $('#second_level').multiselect('rebuild');
   $('#third_level').html('');
   $('#third_level').multiselect('rebuild');
   var selected = this.$select.val();
  
   //var arr = toString(selected);
//   alert(selected[0]);
//           var myStr = "The quick brown fox jumps over the lazy dog.";
//                 var strArray = selected.split(",");
//                 console.log(strArray);
//                 // Display array values on page
                
//                     if(selected == 'Travel' || selected == 'Property' || selected == 'Event Planner' ){
                        
                
  
//   if(selected == 'Travel' || selected == 'Property' || selected == 'Event Planner' ){
    //   alert("test");
    //   document.querySelector('#selectedcetegory').style.display = `none`;
    //   document.querySelector('#categoryerror').innerHTML = `There is no sub-categories for ${selected}`;
                    // } 
//                       else{
                    
//       document.querySelector('#selectedcetegory').style.display = `block`;
  
//   }
   
      if(selected.includes('Loan') || selected.includes('Insurance') || selected.includes('Banking') ){
                document.querySelector('#selectedcetegory').style.display = `block`;
              } else{
                  document.querySelector('#selectedcetegory').style.display = `none`;}
                    
   if(selected.length > 0)
   {
    $.ajax({
     url:"dashboard/multi-drop/fetch_second_level_category.php",
     method:"POST",
     data:{selected:selected},
     success:function(data)
     {
         
      $('#second_level').html(data);
      $('#second_level').multiselect('rebuild');
     }
        
    })
   }
   
  }
 });

 $('#second_level').multiselect({
  nonSelectedText: 'Select Sub-Category',
  buttonWidth:'100%'
  
//   alert(nonSelectedText);
//   onChange:function(option, checked)
//   {
//   $('#third_level').html('');
//   $('#third_level').multiselect('rebuild');
//   var selected = this.$select.val();
//   if(selected.length > 0)
//   {
//     $.ajax({
//      url:"fetch_third_level_category.php",
//      method:"POST",
//      data:{selected:selected},
//      success:function(data)
//      {
//       $('#third_level').html(data);
//       $('#third_level').multiselect('rebuild');
//      }
//     });
//   }
//   }
 });
 
    });
    
    
    
    function subscriptionDuration2(val){
       
      let calulatebyduration = byselecteddata * val;
      document.getElementById('amount').value = calulatebyduration;
   
      calculateGST(calulatebyduration);
    }
    
//   puhupwas Final Subscription Duration  Selecton
    function subscriptionDuration(subDuration){
        
        var userLicense = document.querySelector("#user-license").value;
        var vendorType = document.querySelector("#vendorType").value;
        // alert(subDuration + userLicense + vendorType)
        
        
        // subArray has 2 output button tag Category and  Subcategory, we need Subcategories(subArray[1]) Titles(subArray[1].title) 
        var subArray = document.querySelectorAll(".multiselect, .dropdown-toggle, .btn, .btn-default");
        // puhupwas subArray problem if more than 2
        
        var categoryTitles = subArray[0].title;
        var subcateogoryTitles = subArray[1].title;
        // subcateogoryTitles returning Subcategory as a String -------Bussiness Loan, General Insurance, Life Insurance
        console.log(categoryTitles);
        var categoryTitlesinArr = categoryTitles.split(',');
        var subcateogoryTitlesinArr = subcateogoryTitles.split(',');
        // colsole.log(categoryTitlesinArr);
        // Travel, Property, Event Planner
      
        var categorySelectedCount = 0;
        if(categoryTitlesinArr.includes('Travel')){
           categorySelectedCount++;
        // alert(categorySelectedCount+'aa');
        }
        // space is coming from selected ' Property'
        if(categoryTitlesinArr.includes(' Property')){
            categorySelectedCount++;
            // alert(categorySelectedCount+'bb');
        
        }
        // space is coming from selected ' Event Planner'
        if(categoryTitlesinArr.includes(' Event Planner')){
            categorySelectedCount++;
        // alert(categorySelectedCount+'cc');
        }
        
        // alert(categorySelectedCount);
        // totalCategoryAmountofTPE (Travel, Property, Event Planner)
        var totalCategoryAmountofTPE = 0;
        if(vendorType == 'Standerd Vendor'){   
          
            //Other Standerd Vendor(OSV)    
            // Business Loan and Personal Loan of Standerd Vendor(BPoSV)  
            if(userLicense == '0-10'){
            var OSV =   3000;
            var BPoSV = 5000;
            var totalCategoryAmountofTPE = OSV*categorySelectedCount;
            // alert('catamo'+totalCategoryAmountofTPE);    
            
            } else if(userLicense == '10-20'){
            var OSV =   5000;
            var BPoSV = 8000;  
            var totalCategoryAmountofTPE = OSV*categorySelectedCount;
            } else {
        
            var OSV =   10000;
            var BPoSV = 15000;
            var totalCategoryAmountofTPE = OSV*categorySelectedCount;
            }
            
            var subCategories = {'Personal Loan':BPoSV,
                               'Car / Two Wheeler Loan':OSV,
                               'Home Loan':OSV,
                               'Commercial Vehicle Loan':OSV,
                               'Gold Loan':OSV,
                               'Bussiness Loan':BPoSV,
                               'General Insurance':OSV,
                               'Life Insurance':OSV,
                               'Health Insurance':OSV,
                               'Vehicle Insurance':OSV,
                               'Banking':OSV,
                               'Stock Market':OSV,
                               'Mutual Fund':OSV,
                               'Credit Card':OSV};  
                        // var fk = subCategories.includes();       
                        // alert(fk);
                               
            // alert(subCategories['Personal Loan']);
            var i = 0 ;
            var subcatAmt = 0;
            console.log(subcateogoryTitlesinArr);
            while( i<subcateogoryTitlesinArr.length){
                var selectedSub = subcateogoryTitlesinArr[i].trim();
                var subcatAmt = subcatAmt + subCategories[selectedSub];
                // alert(subcatAmt);
                i++;
           }
        
        //   alert(subcatAmt); total subcategory amount which selected
          var totalAmtCatSubcat = subcatAmt + totalCategoryAmountofTPE;
        //   alert(totalAmtCatSubcat);
        
          var subDurationTrim = subDuration.trim();
          
            switch(subDurationTrim){
                  case 'monthly':
                    var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*1;
                    // alert(totalAmtCatSubcatAfterdur);
                    break;
                  case 'quarterly':
                    var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*3;
                    // alert(totalAmtCatSubcatAfterdur);
                    break;
                  case 'half yearly':
                     var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*6;
                    //  alert(totalAmtCatSubcatAfterdur);
                    break;
                  case 'yearly':
                    var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*12;
                    // alert(totalAmtCatSubcatAfterdur);
                    break;
                  default:
                  var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*1;
            }      
              
              
              

            
        // // vendorType == 'Priority Vendor'    
        } else {
        
             // Other Priority Vendor(OPV)
             // Business Loan and Personal Loan of Priority Vendor(BPoPV)
             var totalCategoryAmountofTPE = 0;
             if(userLicense == '0-10'){
            var OPV =   9000;
            var BPoPV = 15000;
            var totalCategoryAmountofTPE = OPV*categorySelectedCount;
            
            } else if(userLicense == '10-20'){
        
            var OPV =   15000;
            var BPoPV = 24000; 
            var totalCategoryAmountofTPE = OPV*categorySelectedCount;
            } else {
        
            var OPV =   30000;
            var BPoPV = 45000; 
            var totalCategoryAmountofTPE = OPV*categorySelectedCount;
            }
            
            var subCategories = {'Personal Loan':BPoPV,'Car / Two Wheeler Loan':OPV,'Home Loan':OPV,'Commercial Vehicle Loan':OPV,'Gold Loan':OPV,'Bussiness Loan':BPoPV,'General Insurance':OPV,'Life Insurance':OPV,'Health Insurance':OPV,'Vehicle Insurance':OPV,'Banking':OPV,'Stock Market':OPV,'Mutual Fund':OPV,'Credit Card':OPV};  
          
            var i = 0 ;
            var subcatAmt = 0;
            console.log(subcateogoryTitlesinArr);
            while( i<subcateogoryTitlesinArr.length){
                var selectedSub = subcateogoryTitlesinArr[i].trim();
                var subcatAmt = subcatAmt + subCategories[selectedSub];
                i++;
           } //end of while
           
            //   alert(subcatAmt); total subcategory amount which selected
            var totalAmtCatSubcat = subcatAmt + totalCategoryAmountofTPE;
            
            
            var subDurationTrim = subDuration.trim();
          
            switch(subDurationTrim){
                  case 'monthly':
                    var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*1;
                    // alert(totalAmtCatSubcatAfterdur);
                    break;
                  case 'quarterly':
                    var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*3;
                    // alert(totalAmtCatSubcatAfterdur);
                    break;
                  case 'half yearly':
                     var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*6;
                    //  alert(totalAmtCatSubcatAfterdur);
                    break;
                  case 'yearly':
                    var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*12;
                    // alert(totalAmtCatSubcatAfterdur);
                    break;
                  default:
                  var totalAmtCatSubcatAfterdur = totalAmtCatSubcat*1;
            }      
              
            
            
            
            
            
    
        } //end of vendorType else condition
    
    
  }  // end of userLicense function 
    

  
  


// puhupwas KYC and Subscription Calculation
 document.querySelector("#subCharges").style.display =  "block";
    document.querySelector(".amount-div").innerHTML = `
        <div class="col-md-12" style="display:flex">
        <span style="padding-top:7px;width:50px">INR &#8377;</span>
        <input type="number" class="form-control" name="amount" onkeyup="calculateGST(this.value)" placeholder="Enter Amount" required id="amount" readonly>
        </div>
    `;
    document.querySelector(".total-amount-div .total-a").style.display="none";
    document.querySelector(".total-amount-div .total-b").style.display="none";
    
    
    
    
    
function showAmountField(val){
    if(val == "KYC charges"){
        
    document.querySelector(".total-amount-div .total-a").style.display="block";
    document.querySelector(".total-amount-div .total-b").style.display="none";
        // <div class="col-md-12" style="display:flex">
        //     <span style="padding-top:7px;width:50px">INR &#8377;</span>
        //     <input type="hidden" name="total_amount" value="500">
        //     <input type="number" value="500" class="form-control" disabled  id ="total_amount2">
        // </div>`;
    document.querySelector(".amount-div").style.display =  "none";
    document.querySelector("#subCharges").style.display =  "none";
    
    }
    else{
        
    document.querySelector("#subCharges").style.display =  "block";
    // document.querySelector(".amount-div").innerHTML = `
    //     <div class="col-md-12" style="display:flex">
    //     <span style="padding-top:7px;width:50px">INR &#8377;</span>
    //     <input type="number" class="form-control" name="amount" onkeyup="calculateGST(this.value)" placeholder="Enter Amount" required>
    //     </div>
    // `;
    document.querySelector(".amount-div").style.display =  "block";
    document.querySelector(".total-amount-div .total-b").style.display="block";
    document.querySelector(".total-amount-div .total-a").style.display="none";
    // var val = document.querySelector(".amount-div #id").value;
    
    }
}

showAmountField("test");


function calculateGST(val){
    
    let percent = (18*val)/100;
    let valint = parseInt(val);
    let totalamount = Math.round(valint + percent);
    document.querySelector(".total-amount-div .total-b").innerHTML = `
    <div class="col-md-12">
    <h6>Tax : 18% GST</h6>
    <h6>Grand Total</h6>
    <div style="display:flex">
     <span style="padding-top:7px;width:50px">INR &#8377;</span>
     <input type="hidden" name="total_amount" value="${totalamount}">
    <input type="number" class="form-control"  id="total_amount" value="${totalamount}" readonly>
    </div>
    </div>
    `;
    
    
    
    
}


function showDrop(val){
        
        if(val == "Social-Media"){
            document.querySelector(".reference_name_div").innerHTML = `
             <div class="col-md-12">
             <select class="form-control populate select2-offscreen" name="reference_name" id="reference_name">
              <option value="">Reference Name</option>
            <option value="Facebook">Facebook</option>
            <option value="Google+">Google+</option>
            <option value="Instagram">Instagram</option>
            <option value="Twitter">Twitter</option>
            <option value="Youtube">Youtube</option>
            
            </select>
            </div>
            `;
        }
        if(val == "Legend-Call-Employee"){
            document.querySelector(".reference_name_div").innerHTML = `
            
             <div class="col-md-12">
            <input type="text" class="form-control populate select2-offscreen" name="reference_name" id="reference_name"  required placeholder="Employee Id">
            </div>
            `;
        }
        if(val == "Newsletter"){
            document.querySelector(".reference_name_div").innerHTML = `
             
             <div class="col-md-12">
            <select class="form-control populate select2-offscreen" name="reference_name" id="reference_name">
            <option value="">Reference Name</option>
            <option value="Business-Lines">Business-Lines</option>
            <option value="Hindustan-Times">Hindustan-times</option>
            <option value="Mail-Today">Mail-today</option>
            <option value="Navbharat-Times">Navbharat-times</option>
            </select>
            </div>
            `;
        }
    }
    
    
       $(function () {
    //Initialize Select2 Elements
    $('#state').select2();
    $('#district').select2();
})
    
    function showDistrict(val){
    let formdata = new FormData();
    formdata.append("state",val);
    fetch("php/get-district.php",{
        method:"POST",
        body:formdata
    }).then(data=>data.text())
    .then(response=>{
        document.querySelector("#district").innerHTML =response;
    })
    }
    
    function validateNum(){
        let number = document.querySelector("#mobile").value;
        if(number.length != 10){
            document.querySelector(".my-error").innerHTML = `<span style="color:red">Invalid Phone Number</span>`;
            
        }
          if(number.length == 10){
            document.querySelector(".my-error").innerHTML = "";
            
        }
    }
    
    var otp = null;
    function verifyPhone(){
         var office =  document.querySelector("#offc_type").value;
             document.querySelector("#verify-button").value = 'Resend OTP';
        let number = document.querySelector("#mobile").value;
        let formdata = new FormData();
        formdata.append("office",office);
        formdata.append("number",number);
        fetch("php/send-message.php",{
            method:"POST",
            body:formdata
        }).then(data=>data.text())
        .then(response=>{
            if(response.match("Existing-number")){
              
              console.log(response);
            }
            else{
                 otp = response;
                 document.querySelector("#otp-span").innerHTML = `<input type="hidden" name="otp" value="${otp}"> `;
             document.querySelector(".my-error").innerHTML = `<span style="color:red">Mobile Number Already Exist Try Another</span>`;
                 if(otp.match('Contact No. Already Exist !')){
                    document.querySelector(".my-error").innerHTML = `<span style="color:red">${otp}</span>`;
                 } else {
                     
                    document.querySelector(".my-error").innerHTML = `<span style="color:green">OTP Sent Successfully</span>`;
                 }
                 
                 console.log(response);
            }
            
           
        })
    //     //  funCalledNos++;
    }
    
    
    function modalshow(msg){
        document.querySelector('#modal-show-id').innerHTML = msg;
         if(msg == '<span style="color:red">Email or Contact No. Already Exist !</span>'){
        document.querySelector("#okinmodal").style.display = "none";
         }
         $("#showSlide").modal("show");
        
    }
    

 
    
      $(document).ready(function(){
         $('#okinmodal').click(function(){
        window.open('https://legendcall.com/','_self');        
         });     
      });
        
 

   
    //  function addVendor(e){
    //  e.preventDefault();
    // let user_otp = document.querySelector("#otp").value;
   
    // if(otp != user_otp){
    //     document.querySelector(".otp-error").innerHTML = `OTP Does Not match`;
    // }else{
   
    // let formdata = new FormData(e.target);
    // fetch("php/vendor-payment.php",{
    // method:"POST",
    // body:formdata
    // }).then(data=>data.text())
    // .then(response=>{
    //     // alert(response);
    //     console.log(response);
    //     modalshow(response);
    //     if(response.match('<span style="color:red;">Email or Contact No. Already Exist !</span>')){
    //     document.querySelector(".show-msg").style.display = "block";
    //         // document.querySelector("#mobile").classList.add("validate");
    //         //  document.querySelector("#email").classList.add("validate");
    //      document.querySelector(".show-msg").innerHTML = response;
    //           document.body.scrollTop = 0;
    //           document.documentElement.scrollTop = 0;
    //         // document.createAttribute("data-dismiss");
    //         // document.querySelector('data-dismiss').setAttribute("modal"); 
    //     }
    //     else{
    //     // console.log(monthDateYear); // 7/3/2020     
    //     document.querySelector(".show-msg").style.display = "block";
    //     document.querySelector(".show-msg").innerHTML = response;
    //     document.body.scrollTop = 0;
    //     document.documentElement.scrollTop = 0;

    //     window.open('https://legendcall.com/','_self');        
    //     }
    
        
    // })
     
    // }//otp if ends
    
    //  } 
     

     function validateOTP(val){
         
         if(otp == val){
             document.querySelector(".otp-error").innerHTML = `<span style="color:green;font-size:13px">OTP Matched</span>`;
         }else{
              document.querySelector(".otp-error").innerHTML = `<span style="color:red;font-size:13px">OTP Does Not Match</span>`;
         }
         
         
     }
    
 <?php    if(isset($_SESSION['InsertMsg'])){
     
    $msg = $_SESSION['InsertMsg'];
    
    ?>
 modalshow('<?php echo $msg ?>');
<?php 
     unset($_SESSION['InsertMsg']);
     
 }

?>
   
</script>
 
     </body>
</html>