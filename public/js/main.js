// $document).ready(function(){
//  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
//      localStorage.setItem('activeTab', $(e.target).attr('href'));
//  });
//  var activeTab = localStorage.getItem('activeTab');
//  if(activeTab){
//      $('#myTab a[href="' + activeTab + '"]').tab('show');
//  }
// });

$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#attendance a[href="' + activeTab + '"]').tab('show');
    }
});


$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#knowledgebase a[href="' + activeTab + '"]').tab('show');
    }
});


$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#emp_detail_tab a[href="' + activeTab + '"]').tab('show');
    }
});



$(document).ready(function(){
    $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
        localStorage.setItem('activeTab', $(e.target).attr('href'));
    });
    var activeTab = localStorage.getItem('activeTab');
    if(activeTab){
        $('#client_detail_tab_nav a[href="' + activeTab + '"]').tab('show');
    }
});

// get real time image



function GetFileSize1(input) {
    var fi = document.getElementById('file1'); // GET THE FILE INPUT.

    // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
    if (fi.files.length > 0) {
        // RUN A LOOP TO CHECK EACH SELECTED FILE.
        for (var i = 0; i <= fi.files.length - 1; i++) {

            var fsize = fi.files.item(i).size; // THE SIZE OF THE FILE.
if(fsize >2097152){
alert('max');
return false;

}
else{
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
     $('#img1')
         .attr('src', e.target.result)
         .width(182)
         .height(184);
};

reader.readAsDataURL(input.files[0]);
}
}
            // document.getElementById('result').innerHTML = fsize;
                // document.getElementById('result').innerHTML + '<br /> ' +
                // '<b>' + Math.round((fsize / 1024)) + '</b> KB';
        }
    }
}








function GetFileSize2(input) {
    var fi = document.getElementById('file212'); // GET THE FILE INPUT.

    // VALIDATE OR CHECK IF ANY FILE IS SELECTED.
    if (fi.files.length > 0) {
        // RUN A LOOP TO CHECK EACH SELECTED FILE.
        for (var i = 0; i <= fi.files.length - 1; i++) {

            var fsize = fi.files.item(i).size; // THE SIZE OF THE FILE.
if(fsize >2097152){
alert('max');
return false;

}
else{
if (input.files && input.files[0]) {
var reader = new FileReader();

reader.onload = function (e) {
     $('#img212')
         .attr('src', e.target.result)
         .width(182)
         .height(184);
};

reader.readAsDataURL(input.files[0]);
}
}
            // document.getElementById('result').innerHTML = fsize;
                // document.getElementById('result').innerHTML + '<br /> ' +
                // '<b>' + Math.round((fsize / 1024)) + '</b> KB';
        }
    }
}




function GetFileSize3(input) {
    var fi = document.getElementById('file567'); // GET THE FILE INPUT.
    if (fi.files.length > 0) {
        for (var i = 0; i <= fi.files.length - 1; i++) {
            var fsize = fi.files.item(i).size; // THE SIZE OF THE FILE.
if(fsize >2097152){
alert('max');
return false;
}
else{
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function (e) {
     $('#img567')
         .attr('src', e.target.result)
         .width(182)
         .height(184);
};

reader.readAsDataURL(input.files[0]);
}
}
        }
    }
}






function hide_marriage(){
    document.getElementById('k0chec').style.display="none";
     }
     function show_marriage(){ 
        document.getElementById('k0chec').style.display="block";
     }

     function show_ielts(){
        document.getElementById('ielts_div').style.display="block";
     }

     function hide_ielts(){
        document.getElementById('ielts_div').style.display="none";
     }


     function show_history(){
     document.getElementById('k0ck').style.display="block";
     }

     function hide_history(){
     document.getElementById('k0ck').style.display="none";
     }



function show_visa_rejected(){
    document.getElementById('visa_rejected_country').style.display="block";
    document.getElementById('visa_rejected_button').style.display="block";
    }

    function hide_visa_rejected(){
    document.getElementById('visa_rejected_country').style.display="none";
    document.getElementById('visa_rejected_button').style.display="none";
    }






     function email_confirm(){
        var a = document.getElementById('email').value;
        var b = document.getElementById('email_confirm_id').value;
        alert(a);
        if(a != b){
            alert('not match');
        }
        else{
            alert('dfsd');
        }
     }


    // $(document).ready(function(){
    //      $('#enquiry').submit(function(e){
    //          var name =   $('[name="name"]').value();
    //          alert(name);
    //          return false;
    //      })
    // });

//  $(document).ready(function(){
// $(".nav-link").click(function(event){
//  $(this).hide();
// });

//  }




var agent_create = document.getElementById("agent_create");
var create_agent_button = document.getElementById("create_agent_button");
var close3 = document.getElementsByClassName("close3")[0];
create_agent_button.onclick = function() {
    agent_create.style.display = "block";
}
if(typeof(close3) != 'undefined'){
close3.onclick = function() {
    agent_create.style.display = "none";
}
}
window.onclick = function(event) {
if (event.target == agent_create) {
agent_create.style.display = "none";
}
// if (event.target == agent_update) {
// window.history.back();
//  };

}

 



// var agent_create = document.getElementById("agent_update");
// var create_agent_button = document.getElementById("update_agent_button");
// var close3 = document.getElementsByClassName("close3")[0];
// create_agent_button.onclick = function() {
//  agent_create.style.display = "block";
// }
// close3.onclick = function() {
//  agent_create.style.display = "none";
// }
// window.onclick = function(event) {
// if (event.target == agent_create) {
// agent_create.style.display = "none";
// }
// }



// function show_agent_more_feild(){
// document.getElementById('show_agent_more_feild').style.display="block";
function show_agent_more_feild() {
    var x = document.getElementById("show_agent_more_feild");
    // var button =
document.getElementsByName('agent-more-feild').innerHTML = "sdfsd";

    if (x.style.display === "block") {

        // document.getElementsByName("agent-more-feild")[0].innerHTML = button;
     x.style.display = "none";
    } else {
     x.style.display = "block";
    // document.getElementsByName("agent-more-feild")[0].innerHTML = button;
    }
}


function toggle_experience_feild(){
    var x = document.getElementById("last_company_experience");
    if (x.style.display == "block") {
     x.style.display = "none";
    } else {
     x.style.display = "block";
    }
}

function toggle_bank_feild(){
    var x = document.getElementById("employee_account_information");
    if (x.style.display === "block") {
     x.style.display = "none";
    } else {
     x.style.display = "block";
    }
}


function toggle_document_feild(){
    var x = document.getElementById("employee_document");
    if (x.style.display === "block") {
     x.style.display = "none";
    } else {
     x.style.display = "block";
    }
}


function pause(){
    document.getElementById('play').style.display="none";
    document.getElementById('pause').style.display="block";
}

function play(){
    document.getElementById('pause').style.display="none";
    document.getElementById('play').style.display="block";
}




function edit_emp_designation(){
    $('#edit_designation').show()
}
function edit_emp_designation_button(){
    $('#edit_designation').hide()
}

$(document).ready(function(){
    $('.open-edit-class').on('click',function(){
        $('#edit_name').show();
    });
    $('.close-edit-class').on('click',function(){
        $('#edit_name').hide();
    });
})


// course filter js

$(document).ready(function () {
    var navListItems = $('div.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');
          allWells.hide();
    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);
        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primar').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });
    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' +
curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;
        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });
    $('div.setup-panel div a.btn-primary').trigger('click');
});

// end course filter

// document.getElementById('next_button_country').setAttribute("disabled", "");
// document.getElementById('next_button4').setAttribute("disabled", "");
// document.getElementById('next_button2').setAttribute("disabled", "");
// document.getElementById('highest_educations').setAttribute("disabled", "");
// document.getElementById('grading_scheme').setAttribute("disabled", "");
// document.getElementById('grade_average').setAttribute("disabled", "");


function check_empty_country(){
    var a = document.getElementById('select_country').value;
    // var b = document.getElementById('college').value;


if((a != '') (a != 'India')){
    var next_button_country = document.getElementById('next_button_country');
    next_button_country.removeAttribute("disabled", "");
}

// if(b!="") {

//  var next_button4 = document.getElementById('next_button4');
//  next_button4.removeAttribute("disabled", "");
// }
}

function country_of_education(){
    var c =document.getElementById('country_of_education_id').value;
    if(c!="") {
    var next_button2 = document.getElementById('highest_educations');
    next_button2.removeAttribute("disabled", "");
}
}

function highest_educations_fun(){
    var c =document.getElementById('highest_educations').value;
    if(c!="") {
    var next_button2 = document.getElementById('grading_scheme');
    next_button2.removeAttribute("disabled", "");
}
}

function grade_average_fun(){
    var c =document.getElementById('grading_scheme').value;
    if(c!="") {
    var next_button2 = document.getElementById('grade_average');
    next_button2.removeAttribute("disabled", "");
}
}

function enable_button2(){
    var c =document.getElementById('grade_average').value;
    if(c!="") {
    var next_button2 = document.getElementById('next_button2');
    next_button2.removeAttribute("disabled", "");
}
else{
    var next_button2 = document.getElementById('next_button2');
    next_button2.setAttribute("disabled", "");
}
}



function check_eng_test(){
    var a = document.getElementById('eng_test').value;
    if(a != ""){
        document.getElementsByClassName('language-test')[0].style.display="block";
    }
    else{
        document.getElementsByClassName('language-test')[0].style.display="none";
    }
}


$(document).ready(function(){
    $('.close').click(function(){
        // alert('d');
        // $('.close').parent().hide();
    });
});



function add_score(){
    var score = document.getElementById('select_english_score').value;
    if(score == "toefl"){
document.getElementById('toefl').style.display="block";
document.getElementById('ielts').style.display="none";
    }
    if(score == "ielts"){
        document.getElementById('ielts').style.display="block";
        document.getElementById('toefl').style.display="none";
            }
}


function about_see_more(){
    // document.getElementById('about').style.height="auto";


    var x = document.getElementById("about");
    if (x.style.height === "auto") {
     x.style.height = "175px";
     window.scroll({
        behavior: 'smooth'
     });
     }
     else {
     x.style.height = "auto";
     window.scroll({
        behavior: 'smooth'
     });
    }
}



//     $(document).ready(function(){
        
//         $('.view-more-button').click(function(){
            
//          var a =    $(this).parent().parent('div.program-filter').height();        
//     if(a < '500'){
//     $(this).parent().parent().height('500px');
//         $(this).parent().parent().css('overflow','auto');
//         $(this).parent().css('position','relative');
//         $(this).css('top',0);
//     }
// else{
//         $(this).parent().parent().scrollTop('0');
//         $(this).parent().parent().scrollTop('0');
//         $(this).parent().parent().height('134px');
//         $(this).parent().parent().css('overflow','hidden');
//         $(this).parent().css('position','unset');
//         $(this).css('top','129px');
        
// }
// });
// });



$(document).ready(function(){

    $('#jon:select').on('change',function(){
        alert('sdfgd');
        $(this).parent().find('.tes').css('background', 'red');
    });
});



document.addEventListener("DOMContentLoaded", function(event) {
var tra = document.getElementById('files1');
if(typeof(tra) != 'undefined' && tra != null){
    
tra.setAttribute("disabled", "");
}
})

// $(document).ready(function(){
//  $("#qualification1").change(function(){
//      $(this).parent().find(".tes").removeAttr("disabled");
//  })
// })

function hide_selected_value(val,id2){
    if(val != "1"){

        $('#'+id2).parent().find(".tes").removeAttr("disabled");
        a = val;
        document.getElementById('files1').setAttribute("title",a);
    }
}

function hide_selected_value2(val){
    if(val != "1"){
        $('#files2').removeAttr("disabled");
        a = val;
    }
}
function hide_selected_value3(val){
    if(val != "1"){
        $('#files3').removeAttr("disabled");
        a = val;
    }
}
function hide_selected_value4(val){
    if(val != "1"){
        $('#files4').removeAttr("disabled");
        a = val;
    }
}

function hide_selected_value5(val){
    if(val != "1"){
        $('#files5').removeAttr("disabled");
        a = val;
    }
}
function hide_selected_value6(val){
    if(val != "1"){
        $('#files6').removeAttr("disabled");
        a = val;
    }
}
function hide_selected_value7(val){
    if(val != "1"){
        $('#files7').removeAttr("disabled");
        a = val;
    }
}






function handleFileSelect2() {
if (window.File && window.FileList && window.FileReader) {
var files = event.target.files; //FileList object
var output = document.getElementById("result");
// output.innerHTML = "";
for (var i = 0; i < files.length; i++) {
var file = files[i];
var picReader = new FileReader();
picReader.addEventListener("load", function (event) {
var picFile = event.target;
var div = document.createElement("div");

div.setAttribute("style","position:relative");
if(file.type.match('image')){
div.innerHTML += " <span class='fa fa-close'></span>    <img class='thumbnail' src='" + picFile.result + "'"
+ "title'" + a + "'/> <p style='text-align:center;'>"+a+"</p>";

output.insertBefore(div, null);
}
else if(file.type.match('pdf')){
    div.innerHTML += "  <span class='fa fa-close'></span>  <iframe class='thumbnail' src='"
+ picFile.result +  "'/> </iframe> <p style='text-align:center;'>"+a+"</p>";
output.insertBefore(div, null);
                    }
                    else{
                        alert('Only Image Or PDF Accepted');
                    }
});
picReader.readAsDataURL(file);
}


}

else {
console.log("Your browser does not support File API");
}
remov();
}
function handleFileSelect3() {  
if (window.File && window.FileList && window.FileReader) {
var files = event.target.files; //FileList object
var output = document.getElementById("result");
for (var i = 0; i < files.length; i++) {
var file = files[i];
var picReader = new FileReader();
picReader.addEventListener("load", function (event) {
var picFile = event.target;
var div = document.createElement("div");

div.setAttribute("style","position:relative");
if(file.type.match('image')){
div.innerHTML += " <span class='fa fa-close'></span>    <img class='thumbnail' src='" + picFile.result + "'"
+ "title'" + a + "'/> <p style='text-align:center;'>"+a+"</p>";
output.insertBefore(div, null);
}
else if(file.type.match('pdf')){
    div.innerHTML += "  <span class='fa fa-close'></span>  <iframe class='thumbnail' src='"
+ picFile.result +  "'/> </iframe> <p style='text-align:center;'>"+a+"</p>";
output.insertBefore(div, null);
                    }
                    else{
                        alert('Only Image Or PDF Accepted');
                    }
});


picReader.readAsDataURL(file);
}
} else {
console.log("Your browser does not support File API");
remov();
}
}
function handleFileSelect4() {
if (window.File && window.FileList && window.FileReader) {
var files = event.target.files; //FileList object
var output = document.getElementById("result");
for (var i = 0; i < files.length; i++) {
var file = files[i];
var picReader = new FileReader();
picReader.addEventListener("load", function (event) {
var picFile = event.target;
var div = document.createElement("div");
div.setAttribute("style","position:relative");
if(file.type.match('image')){
div.innerHTML += " <span class='fa fa-close'></span>    <img class='thumbnail' src='" + picFile.result + "'"
+ "title'" + a + "'/> <p style='text-align:center;'>"+a+"</p>";

output.insertBefore(div, null);
}
else if(file.type.match('pdf')){
    div.innerHTML += "  <span class='fa fa-close'></span>  <iframe class='thumbnail' src='"
+ picFile.result +  "'/> </iframe> <p style='text-align:center;'>"+a+"</p>";
output.insertBefore(div, null);
                    }
                    else{
                        alert('Only Image Or PDF Accepted');
                    }
});
picReader.readAsDataURL(file);
}
} else {
console.log("Your browser does not support File API");
}
}

function handleFileSelect5() {
if (window.File && window.FileList && window.FileReader) {
var files = event.target.files; //FileList object
var output = document.getElementById("result");
for (var i = 0; i < files.length; i++) {
var file = files[i];
var picReader = new FileReader();
picReader.addEventListener("load", function (event) {
var picFile = event.target;
var div = document.createElement("div");

div.setAttribute("style","position:relative");
if(file.type.match('image')){
div.innerHTML += " <span class='fa fa-close'></span>    <img class='thumbnail' src='" + picFile.result + "'"
+ "title'" + a + "'/> <p style='text-align:center;'>"+a+"</p>";
output.insertBefore(div, null);
}
else if(file.type.match('pdf')){
    div.innerHTML += "  <span class='fa fa-close'></span>  <iframe class='thumbnail' src='"
+ picFile.result +  "'/> </iframe> <p style='text-align:center;'>"+a+"</p>";
output.insertBefore(div, null);
                    }
                    else{
                        alert('Only Image Or PDF Accepted');
                    }
});
picReader.readAsDataURL(file);
}
} else {
console.log("Your browser does not support File API");
}
}
function handleFileSelect6() {
if (window.File && window.FileList && window.FileReader) {
var files = event.target.files; //FileList object
var output = document.getElementById("result");
for (var i = 0; i < files.length; i++) {
var file = files[i];
var picReader = new FileReader();
picReader.addEventListener("load", function (event) {
var picFile = event.target;
var div = document.createElement("div");
                var title = document.createElement("h4");
                title.innerHTML = a;
div.innerHTML += "<img class='thumbnail' src='" + picFile.result + "'"
+ "title='" + a+ "'/>";
output.insertBefore(div, null);
});
picReader.readAsDataURL(file);
}
} else {
console.log("Your browser does not support File API");
}
}
function handleFileSelect7() {
if (window.File && window.FileList && window.FileReader) {
var files = event.target.files; //FileList object
var output = document.getElementById("result");
for (var i = 0; i < files.length; i++) {
var file = files[i];
var picReader = new FileReader();
picReader.addEventListener("load", function (event) {
var picFile = event.target;
var div = document.createElement("div");
                var title = document.createElement("h4");
                title.innerHTML = a;
div.innerHTML += "<img class='thumbnail' src='" + picFile.result + "'"
+ "title='" + a+ "'/>";
output.insertBefore(div, null);
});
picReader.readAsDataURL(file);
}
} else {
console.log("Your browser does not support File API");
}
}



function handleFileSelec() {
    //Check File API support
    if (window.File && window.FileList && window.FileReader) {
    
    var files = event.target.files; //FileList object
    var output = document.getElementById("result");
    
    for (var i = 0; i < files.length; i++) {
    var file = files[i];
    //Only pics
    // if (!file.type.match('image')) continue;
    
    var picReader = new FileReader();
    picReader.addEventListener("load", function (event) {
    var picFile = event.target;
    var div = document.createElement("div");
                    // var hol = document.createElement("div");
                    if(file.type.match('image')){
    div.innerHTML += "<img class='thumbnail' src='" + picFile.result + "'"
    + "ti='" + a + "'/>";
                    output.insertBefore(div, null);
                    }
                    else if(file.type.match('pdf')){
                        div.innerHTML += "<iframe class='thumbnail' src='"
    + picFile.result + "'" + "ti='" + a + "'/>";
                    output.insertBefore(div, null);
                    }
                    else{
                        alert('Only Image Or PDF Accepted');
                    }
    });
    //Read the image
    picReader.readAsDataURL(file);
    }
    } else {
    console.log("Your browser does not support File API");
    }
    }


//     var a = document.getElementsByClassName('add-status')[0];
// a.setAttribute("disabled", "disabled");
    // $(document).ready(function(){
    //     $('.add-status').onload(function(){
    //         $('.add-status').attr("disabled", 'disabled');
    //     }); 
    // })
        
    // .add-status {
    //     pointer-events:none;
    //   }


function remov(){
        $('.fa-close').on('click',function(){
        $(this).parent().remove();
    });
}
    
function toefl_show(){
    document.getElementById('toefl_select').style.display ="flex";
  }
  function toefl_hide(){
    document.getElementById('toefl_select').style.display ="none";
  }
  function ielts_show(){
    document.getElementById('ielts_select').style.display ="flex";
  }
  function ielts_hide(){
    document.getElementById('ielts_select').style.display ="none";
  }
  function pte_show(){
    document.getElementById('pte_select').style.display ="flex";
  }
  function pte_hide(){
    document.getElementById('pte_select').style.display ="none";
  }

  function oet_show(){
    document.getElementById('oet_select').style.display ="flex";
  }
  function oet_hide(){
    document.getElementById('oet_select').style.display ="none";
  }

$(document).ready(function(){
    $('#visa_not_rejected').click(function(){
      $('.add-visa-rejected-country').hide();
  });
});






// function show_hide_notification(){
//     var x = document.getElementsByClassName('notificitaion-show')[0];
//     if (x.style.display == "block") {
//      x.style.display = "none";
//     } else {
//      x.style.display = "block";
//     } 
// }


 

// $(document).mouseup(function (e)
//                     {
//   var container = $(".logout-profile"); // YOUR CONTAINER SELECTOR

//   if (!container.is(e.target) // if the target of the click isn't the container...
//       && container.has(e.target).length === 0) // ... nor a descendant of the container
//   {
//     container.hide();
//   }
// });





// $(document).ready(function(){
//     $('#alertsDropdown').click(function(){
//         $('.dropdown-list.dropdown-menu.dropdown-menu-right').toggle();
//     })
// })



$(document).ready(function(){
    $('.add-more-document-plus').click(function(){
        // alert('sadsad');
    })
})






