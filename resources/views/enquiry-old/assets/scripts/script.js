//select dropdown js
function DropDown(el) {
  this.dd = el;
  this.initEvents();
}

DropDown.prototype = {
  initEvents: function() {
    var obj = this;

    obj.dd.on('click', function(event) {
      $(this).toggleClass('active');
      event.stopPropagation();
    });
  }
}

$(function() {
  new DropDown($('#dd1'));
  new DropDown($('#dd2'));
  new DropDown($('#edu-dd'));
  new DropDown($('#immi-dd'));
  new DropDown($('#reject-visa-country'));
  new DropDown($('#reject-visa-month'));
  new DropDown($('#financial-options'));
  new DropDown($('#selectgender'));
  

  $(document).click(function() {
    // all dropdowns
    $('.wrapper-dropdown').removeClass('active');
  });
});

// select dropdown text
$('#dd1 a').click(function(){
  var sel_text = $(this).text();
  $("#dd1 span").empty();
  $("#dd1 span").prepend(sel_text);
});


$('#dd2 a').click(function(){
  var sel_text = $(this).text();
  $("#dd2 span").empty();
  $("#dd2 span").prepend(sel_text);
});


$('#edu-dd a').click(function(){
  var sel_text = $(this).text();
  $("#edu-dd span").empty();
  $("#edu-dd span").prepend(sel_text);
});

$('#immi-dd a').click(function(){
  var sel_text = $(this).text();
  $("#immi-dd span").empty();
  $("#immi-dd span").prepend(sel_text);
});

$('#reject-visa-country a').click(function(){
  var sel_text = $(this).text();
  $("#reject-visa-country span").empty();
  $("#reject-visa-country span").prepend(sel_text);
});

$('#reject-visa-month a').click(function(){
  var sel_text = $(this).text();
  $("#reject-visa-month span").empty();
  $("#reject-visa-month span").prepend(sel_text);
});

$('#financial-options a').click(function(){
  var sel_text = $(this).text();
  $("#financial-options span").empty();
  $("#financial-options span").prepend(sel_text);
});

$('#selectgender a').click(function(){
  var sel_text = $(this).text();
  $("#selectgender span").empty();
  $("#selectgender span").prepend(sel_text);
});

//select dropdown js ends


// verify otp box js starts
let digitValidate = function(ele){
  console.log(ele.value);
  ele.value = ele.value.replace(/[^0-9]/g,'');
}

let tabChange = function(val){
	let x = document.getElementsByClassName("otp-box")[0];
    let ele = x.querySelectorAll('input');
    if(ele[val-1].value != ''){
      ele[val].focus()
    }else if(ele[val-1].value == ''){
      ele[val-2].focus()
    }
 }

function submitotp(){
	// document.getElementById('otpsubmit').submit();
	// alert("form submit");


	$.ajax({
        type:"POST",
        cache:false,
        url:"otp-received.php",
        data:"hello",    // multiple data sent using ajax
        success: function (html) {

          $('#otpmsg').html('OTP matched');
         
        },
        error: function(){
        	$('#otpmsg').html('OTP not received');
        }
      });

}



function startTimer(){
  var counter = 21;
  setInterval(function() {
    counter--;
    if (counter >= 0) {
      btntext = document.getElementById("go");
      btntext.innerHTML = "Resend after " + counter +"s";
    }
    if (counter === 0) {
    $("#go").prop("disabled", "");
    $("#go").text("Resend OTP");
    }
  }, 1000);
}
$("#go").click(function(){
    $(this).attr("disabled","disabled");

    startTimer();
 });

// verify otp box js ends


// marital js starts
function maritalhide(){
  document.getElementsByClassName('married-options')[0].style.display ='none';
}
function maritalshow(){
  document.getElementsByClassName('married-options')[0].style.display = 'flex';
}
maritalhide();
$(function () {
  $("#marriagedateinp,#dobinp").datepicker({
        format: 'dd/mm/yyyy', 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update','');
});


// marital js ends

// education section js starts

$(document).ready(function() {
	var counter = 0;
	$("#edu-append-btn").click(function(event) {
			counter++;

	
		document.getElementById('edu-options-append').innerHTML += '<div class="row edu-row my-4"><div class="col-md-2"> <div class="wrapper-dropdown edu-dd" tabindex="1"><span>Qualification</span> <ul class="dropdown"> <li><a href="javascript:void(0);">10</a></li><li><a href="javascript:void(0);">12</a></li><li><a href="javascript:void(0);">Diploma</a></li><li><a href="javascript:void(0);">Bachelors</a></li><li><a href="javascript:void(0);">PHD/Dr.</a></li><li><a href="javascript:void(0);">Masters</a></li></ul> </div></div><div class="col-md-3"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Stream<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-3"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Name of Institute<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-2"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Year of Passing<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-2"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Percentage<sup>*</sup></span> <span class="border"></span> </label> </div></div>';

for(let i=0; i < counter; i++){
let x = document.getElementsByClassName('edu-dd');
	let target = x[i];
	let targetanchorlength = target.getElementsByTagName('a').length;
	let targetspanlength = target.getElementsByTagName('span').length;
	console.log(target);
   new DropDown($(target));

for (let k = 0; k < targetanchorlength; k++) {
let targetanchor = target.getElementsByTagName('a')[k];
  $(targetanchor).click(function(){
  var sel_text = $(this).text();
  for(let j = 0; j < targetspanlength; j++){
let targetspan = target.getElementsByTagName('span')[j];
  $(targetspan).empty();
  $(targetspan).prepend(sel_text);
  }

});
}


}


	});
});

// education section js ends

// work section js starts 
$(document).ready(function() {
	
	$("#work-append-btn").click(function(event) {
			
		document.getElementById('work-options-append').innerHTML += '<div class="row edu-row my-4"> <div class="col-md-2"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Company Name<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-2"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Designation<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-2"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Start Date<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-2"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">End Date<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-1 my-auto"> <small>OR</small> </div><div class="col-md-3"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Duration<sup>*</sup></span> <span class="border"></span> </label> </div></div>';


	});
});
// work section js ends 


// english language test js starts
var toefloptions = document.getElementsByClassName("toefl-options");

var ieltsoptions = document.getElementsByClassName("ielts-options");

var pteoptions = document.getElementsByClassName("pte-options");

for(let i = 0; i <= 30; i++){
    toefloptions[0].innerHTML += '<li><a href="javascript:void(0);">'+ i +'</a></li>';
    toefloptions[1].innerHTML += '<li><a href="javascript:void(0);">'+ i +'</a></li>';
    toefloptions[2].innerHTML += '<li><a href="javascript:void(0);">'+ i +'</a></li>';
    toefloptions[3].innerHTML += '<li><a href="javascript:void(0);">'+ i +'</a></li>';
}

for(let j = 4.5; j <= 9; j += 0.5){
    ieltsoptions[0].innerHTML += '<li><a href="javascript:void(0);">'+ j +'</a></li>';
    ieltsoptions[1].innerHTML += '<li><a href="javascript:void(0);">'+ j +'</a></li>';
    ieltsoptions[2].innerHTML += '<li><a href="javascript:void(0);">'+ j +'</a></li>';
    ieltsoptions[3].innerHTML += '<li><a href="javascript:void(0);">'+ j +'</a></li>';

}

for(let p = 10; p <= 90; p++){
  pteoptions[0].innerHTML += '<li><a href="javascript:void(0);">'+ p +'</a></li>';
  pteoptions[1].innerHTML += '<li><a href="javascript:void(0);">'+ p +'</a></li>';
  pteoptions[2].innerHTML += '<li><a href="javascript:void(0);">'+ p +'</a></li>';
  pteoptions[3].innerHTML += '<li><a href="javascript:void(0);">'+ p +'</a></li>';
}

new DropDown($('#eng-dd1'));
new DropDown($('#eng-dd2'));
new DropDown($('#eng-dd3'));
new DropDown($('#eng-dd4'));
new DropDown($('#eng-dd5'));
new DropDown($('#eng-dd6'));
new DropDown($('#eng-dd7'));
new DropDown($('#eng-dd8'));
new DropDown($('#eng-dd9'));
new DropDown($('#eng-dd10'));
new DropDown($('#eng-dd11'));
new DropDown($('#eng-dd12'));
new DropDown($('#eng-dd13'));
new DropDown($('#eng-dd14'));
new DropDown($('#eng-dd15'));
new DropDown($('#eng-dd16'));
new DropDown($('#select-course-country'));

$('#eng-dd1 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd1 span").empty();
  $("#eng-dd1 span").prepend(sel_text);
});

$('#eng-dd2 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd2 span").empty();
  $("#eng-dd2 span").prepend(sel_text);
});

$('#eng-dd3 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd3 span").empty();
  $("#eng-dd3 span").prepend(sel_text);
});

$('#eng-dd4 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd4 span").empty();
  $("#eng-dd4 span").prepend(sel_text);
});

$('#eng-dd5 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd5 span").empty();
  $("#eng-dd5 span").prepend(sel_text);
});

$('#eng-dd6 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd6 span").empty();
  $("#eng-dd6 span").prepend(sel_text);
});

$('#eng-dd7 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd7 span").empty();
  $("#eng-dd7 span").prepend(sel_text);
});

$('#eng-dd8 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd8 span").empty();
  $("#eng-dd8 span").prepend(sel_text);
});

$('#eng-dd9 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd9 span").empty();
  $("#eng-dd9 span").prepend(sel_text);
});

$('#eng-dd10 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd10 span").empty();
  $("#eng-dd10 span").prepend(sel_text);
});

$('#eng-dd11 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd11 span").empty();
  $("#eng-dd11 span").prepend(sel_text);
});

$('#eng-dd12 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd12 span").empty();
  $("#eng-dd12 span").prepend(sel_text);
});

$('#eng-dd13 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd13 span").empty();
  $("#eng-dd13 span").prepend(sel_text);
});

$('#eng-dd14 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd14 span").empty();
  $("#eng-dd14 span").prepend(sel_text);
});

$('#eng-dd15 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd15 span").empty();
  $("#eng-dd15 span").prepend(sel_text);
});

$('#eng-dd16 a').click(function(){
  var sel_text = $(this).text();
  $("#eng-dd16 span").empty();
  $("#eng-dd16 span").prepend(sel_text);
});

$('#select-course-country a').click(function(){
  var sel_text = $(this).text();
  $("#select-course-country span").empty();
  $("#select-course-country span").prepend(sel_text);
});


function toeflhide(){
  document.getElementsByClassName('toefl-section')[0].style.display ='none';
}
function toeflshow(){
  document.getElementsByClassName('toefl-section')[0].style.display = 'block';
}

function ieltshide(){
  document.getElementsByClassName('ielts-section')[0].style.display ='none';
}
function ieltsshow(){
  document.getElementsByClassName('ielts-section')[0].style.display = 'block';
}

function ptehide(){
  document.getElementsByClassName('pte-section')[0].style.display ='none';
}
function pteshow(){
  document.getElementsByClassName('pte-section')[0].style.display = 'block';
}

function oethide(){
  document.getElementsByClassName('oet-section')[0].style.display ='none';
}
function oetshow(){
  document.getElementsByClassName('oet-section')[0].style.display = 'block';
}


// english language test js ends


// immigration section js starts



$(document).ready(function() {
  var counter = 0;
  $("#immi-append-btn").click(function(event) {
      counter++;

  
    document.getElementById('immi-options-append').innerHTML += ' <div class="row edu-row my-4"> <div class="col-md-3"> <div class="wrapper-dropdown immi-dd" tabindex="1"><span>Country Travelled ?</span> <ul class="dropdown"> <li><a href="javascript:void(0);">10</a></li><li><a href="javascript:void(0);">12</a></li><li><a href="javascript:void(0);">Diploma</a></li><li><a href="javascript:void(0);">Bachelors</a></li><li><a href="javascript:void(0);">Masters</a></li><li><a href="javascript:void(0);">PHD/Dr.</a></li></ul> </div></div><div class="col-md-3"> <label class="inp"> <input type="text" placeholder="&nbsp;" class="imm-dateinp"> <span class="label">From<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-3"> <label class="inp"> <input type="text" placeholder="&nbsp;" class="imm-dateinp"> <span class="label">To<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-3"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Duration<sup>*</sup></span> <span class="border"></span> </label> </div></div>';

for(let i=0; i < counter; i++){
let x = document.getElementsByClassName('immi-dd');
  let target = x[i];
  let targetanchorlength = target.getElementsByTagName('a').length;
  let targetspanlength = target.getElementsByTagName('span').length;
  let targetdatelength = document.getElementsByClassName('imm-dateinp').length;
  console.log(targetdatelength);
   new DropDown($(target));

for (let k = 0; k < targetanchorlength; k++) {
let targetanchor = target.getElementsByTagName('a')[k];
  $(targetanchor).click(function(){
  var sel_text = $(this).text();
  for(let j = 0; j < targetspanlength; j++){
let targetspan = target.getElementsByTagName('span')[j];
  $(targetspan).empty();
  $(targetspan).prepend(sel_text);
  }
});
}

for (let l = 0; l < targetdatelength; l++){
  let targetdateinp = document.getElementsByClassName('imm-dateinp')[l];

  console.log(targetdateinp);
$(function () {
  $(targetdateinp).datepicker({
        format: 'dd/mm/yyyy', 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update','');
});

}

}

  });
});


  $(function () {
  $("#imm-fromdate").datepicker({
        format: 'dd/mm/yyyy', 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update','');

   $("#imm-todate").datepicker({
        format: 'dd/mm/yyyy', 
        autoclose: true, 
        todayHighlight: true
  }).datepicker('update','');
});


function visahide(){
  document.getElementsByClassName('visa-reject-country')[0].style.display ='none';
}
function visashow(){
  document.getElementsByClassName('visa-reject-country')[0].style.display = 'block';
}


$(document).ready(function() {
  var counter = 0;
  $("#visa-append-btn").click(function(event) {
      counter++;

  
    document.getElementById('reject-visa-append-options').innerHTML += '<div class="wrapper-dropdown reject-visa-country my-4" tabindex="1"><span>Select Country</span> <ul class="dropdown"> <li><a href="javascript:void(0);">A</a></li><li><a href="javascript:void(0);">B</a></li><li><a href="javascript:void(0);">C+</a></li><li><a href="javascript:void(0);">C</a></li><li><a href="javascript:void(0);">D</a></li><li><a href="javascript:void(0);">E</a></li></ul> </div>';

for(let i=0; i < counter; i++){
let x = document.getElementsByClassName('reject-visa-country');
  let target = x[i];
  let targetanchorlength = target.getElementsByTagName('a').length;
  let targetspanlength = target.getElementsByTagName('span').length;
  console.log(target);
   new DropDown($(target));

for (let k = 0; k < targetanchorlength; k++) {
let targetanchor = target.getElementsByTagName('a')[k];
  $(targetanchor).click(function(){
  var sel_text = $(this).text();
  for(let j = 0; j < targetspanlength; j++){
let targetspan = target.getElementsByTagName('span')[j];
  $(targetspan).empty();
  $(targetspan).prepend(sel_text);
  }

});
}


}


  });
});


// immigration section js ends


// education section js starts
$(function () {
$("#imm-session-start").datepicker({
    format: "mm/yyyy",
    viewMode: "months", 
    minViewMode: "months"
    });
});

// education section js ends

// financial section js starts


$(document).ready(function() {
  var counter = 0;
  document.getElementById('finance-append-btn').addEventListener("click", function(){
      counter++;

  
  document.getElementById('finance-options-append').innerHTML += ' <div class="row edu-row my-4"> <div class="col-md-6"> <div class="wrapper-dropdown financial-options" tabindex="1"><span>Select</span> <ul class="dropdown"> <li><a href="javascript:void(0);">Bank loan</a></li><li><a href="javascript:void(0);">Personal Fund</a></li><li><a href="javascript:void(0);">Family Sponsorship</a></li><li><a href="javascript:void(0);">Third Party Sponsorship</a></li><li><a href="javascript:void(0);">Other</a></li></ul> </div></div><div class="col-md-3 other-financial-source"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Enter Financial Source<sup>*</sup></span> <span class="border"></span> </label> </div><div class="col-md-3"> <label class="inp"> <input type="text" placeholder="&nbsp;"> <span class="label">Enter Amount<sup>*</sup></span> <span class="border"></span> </label> </div></div>';

for(let i=0; i < counter; i++){
let x = document.getElementsByClassName('financial-options');
  let target = x[i];
  let targetanchorlength = target.getElementsByTagName('a').length;
  let targetspanlength = target.getElementsByTagName('span').length;
  
   new DropDown($(target));

for (let k = 0; k < targetanchorlength; k++) {
let targetanchor = target.getElementsByTagName('a')[k];
  $(targetanchor).click(function(){
  var sel_text = $(this).text();
  for(let j = 0; j < targetspanlength; j++){
let targetspan = target.getElementsByTagName('span')[j];
  $(targetspan).empty();
  $(targetspan).prepend(sel_text);
  }

});
}


}

let otherfinancesection = document.getElementsByClassName('other-financial-source');

let otherfinancialclick = document.getElementsByClassName('financial-options');


for(let l=0; l < otherfinancialclick.length; l++){
let financeclick = otherfinancialclick[l].querySelectorAll("li");
let financeclicklast = otherfinancialclick[l].querySelectorAll("li:last-child");

   $(financeclick).click(function(event) {

   for(let m=0; m < otherfinancesection.length; m++){

let financesection = otherfinancesection[m];

    $(this).parent().parent().parent().parent().find(financesection).hide();
  }
  });

   $(financeclicklast).click(function(event) {
     for(let n=0; n < otherfinancesection.length; n++){
      let financesection = otherfinancesection[n];
   $(this).parent().parent().parent().parent().find(financesection).show();
 }
   });
 }




  });
 
   $("#financial-options li").click(function(event) {
    $("#other-financial-source").hide();
  });

  $("#financial-options li:last-child").click(function(event) {
    $("#other-financial-source").show();
  });

});





// financial section js ends







// upload photo and signature js starts
$("#imgInp1").change(function() {
  readURL1(this);
});
function readURL1(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {

      $('#blah1').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp2").change(function() {
  readURL2(this);
});
function readURL2(input) {

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function(e) {

      $('#blah2').attr('src', e.target.result);
    }

    reader.readAsDataURL(input.files[0]);
  }
}

// upload photo and signature js ends


// validation js starts

//Mobile validation starts
function mobilevalidate(){
 var getphone = document.getElementById('mobileinp').value;
 var mobpattern = /^[0-9]{10}$/;
  if(getphone == ""){
    document.getElementById('mobmsg').innerHTML = "*Please Enter Mobile No.";
      document.getElementById('verifymob').disabled = true;
  }

  else if(!mobpattern.test(getphone)){
    document.getElementById('mobmsg').innerHTML = "*Mobile no. is invalid";
      document.getElementById('verifymob').disabled = true;
  }


  else{
      document.getElementById('mobmsg').innerHTML = "";
      document.getElementById('verifymob').disabled = false;
  } 
}
//Mobile validation ends

//Name Validation starts
function namevalidate(){
  var getname = document.getElementById('nameinp').value;
  var namepattern = /^[A-Z a-z]{2,40}$/;
  var firstcharuppercarse = /^[A-Z][A-Z a-z]{0,40}$/;

  if(getname == ""){
    document.getElementById('namemsg').innerHTML = "*Please Enter Name";
    document.getElementById('dobinp').disabled = true;

  }

  else if(!isNaN(getname)){
  document.getElementById('namemsg').innerHTML = "*Number not allowed";
    document.getElementById('dobinp').disabled = true;

  }

  else if(!firstcharuppercarse.test(getname)){
    document.getElementById('namemsg').innerHTML = "*First letter must in Uppercase";
    document.getElementById('dobinp').disabled = true;
      
  }


   else if(!namepattern.test(getname)){
    document.getElementById('namemsg').innerHTML = "*Name is not valid";
    document.getElementById('dobinp').disabled = true;
      
  }

 
  else{
    document.getElementById('namemsg').innerHTML = "";
    document.getElementById('dobinp').disabled = false;

  }

}
//Name Validation ends

//dob validation starts
function dobvalid(){
  var getdob = document.getElementById('dobinp').value;
  if(getdob != ""){
    document.getElementById('dobmsg').innerHTML = "";
    document.getElementById('emailinp').disabled = false;
  }
}

function dobreqd(){
  var getdob = document.getElementById('dobinp').value;
    if(getdob == ""){
    document.getElementById('dobmsg').innerHTML = "*Please Choose DOB";
    document.getElementById('emailinp').disabled = true;
  }
}
//dob validation ends

// email validation starts
function emailvalid(){
   var getemail = document.getElementById('emailinp').value;
   var emailpattern = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

   if(getemail == ""){
    document.getElementById('emailmsg').innerHTML = "*Please Enter Email";
    document.getElementById('addrinp').disabled = true;

  }

     else if(!emailpattern.test(getemail)){
    document.getElementById('emailmsg').innerHTML = "*Email is not valid";
    document.getElementById('addrinp').disabled = true;
      
  }

  else{
    document.getElementById('emailmsg').innerHTML = "";
    document.getElementById('addrinp').disabled = false;
  }

}

// email validation ends
 // Address field validation starts
function addrvalid(){
   var getaddr = document.getElementById('addrinp').value;
   
   if(getaddr == ""){
    document.getElementById('addrmsg').innerHTML = "*Please Enter Address";
    document.getElementById('selectgender').style.cssText = "pointer-events:none";
    
  }


  else{
    document.getElementById('addrmsg').innerHTML = "";
    document.getElementById('selectgender').style.cssText = "pointer-events:initial";
    
   }
} 

 // Address field validation ends

// gender validation starts

function enablepurposevisit(){
    document.getElementById('dd1').style.cssText = "pointer-events:initial";
}

// gender validation ends


// date of marriage validation starts
function marriagedatevalid(){
  var getmarriagedate = document.getElementById('marriagedateinp').value;
  if(getmarriagedate != ""){
    document.getElementById('marriagedatemsg').innerHTML = "";
    document.getElementById('spousequalinp').disabled = false;
  }
}

function datemarriagereqd(){
  var getmarriagedate = document.getElementById('dobinp').value;
    if(getmarriagedate == ""){
    document.getElementById('marriagedatemsg').innerHTML = "*Please Choose Marriage Date";
    document.getElementById('spousequalinp').disabled = true;
  }
 // console.log(getmarriagedate);
}
// date of marriage validation ends
// spouse qualification validation starts
function spousevalid(){
  var getspouse = document.getElementById('spousequalinp').value;

  if(getspouse ==""){
    document.getElementById('spouseinpmsg').innerHTML = "*Please mention spouse qualification";
    document.getElementById('file').disabled = true;

  }

  else{
   document.getElementById('spouseinpmsg').innerHTML = "";
    document.getElementById('file').disabled = false;
  
  }
 

}

// spouse qualification validation ends

// spouse income proof validation starts
function spouseincomereqd(){
  var getfile = document.getElementById('file').value;
    if(getfile ==""){
    document.getElementById('spouseincomemsg').innerHTML = "Please Upload Income Proof";
  }

  else{
   document.getElementById('spouseincomemsg').innerHTML = "";
  }
}
// spouse income proof validation starts



// validation js ends






























$(document).ready(function() {
	$(".imm-button").click(function(event) {
	$(".imm-content").removeClass("show2");
	$(".imm-content1").addClass("show");
	});

	$("#nextbtn1").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content2").addClass("show");
	});

	$("#nextbtn2").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content3").addClass("show");
	});

	$("#nextbtn3").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content4").addClass("show");
	});

	$("#nextbtn4").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content5").addClass("show");
	});

	$("#nextbtn5").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content6").addClass("show");
	});

  $("#nextbtn6").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content7").addClass("show");
  });

  $("#nextbtn7").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content8").addClass("show");
  });

  $("#nextbtn8").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content9").addClass("show");
  });

  $("#nextbtn9").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content10").addClass("show");
  });

    $("#nextbtn10").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content11").addClass("show");
  });

  $("#nextbtn11").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content12").addClass("show");
  });

  $("#prevbtn1").click(function(event) {
	$(".imm-content").removeClass("show2");
	$(".imm-content").removeClass("show");
	$(".imm-home-con").addClass("show2");
	});

    $("#prevbtn2").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content1").addClass("show");
	});

	$("#prevbtn3").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content2").addClass("show");
	});

	$("#prevbtn4").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content3").addClass("show");
	});

	$("#prevbtn5").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content4").addClass("show");
	});

	$("#prevbtn6").click(function(event) {
	$(".imm-content").removeClass("show");
	$(".imm-content5").addClass("show");
	});

  $("#prevbtn7").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content6").addClass("show");
  });

  $("#prevbtn8").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content7").addClass("show");
  });

  $("#prevbtn9").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content8").addClass("show");
  });

  $("#prevbtn10").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content9").addClass("show");
  });

   $("#prevbtn11").click(function(event) {
  $(".imm-content").removeClass("show");
  $(".imm-content10").addClass("show");
  });
});


