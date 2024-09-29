 $(document).ready(function(){ 
              $('.gre_radio').click(function(){
                 if($(this).prop("checked") == true){
                $('.gre_parent').show(300);
                        }
                        else{
                          $('.gre_parent').hide(300);
                        }
            });
            $('.gre-rank').change(function(){
              
              var a = $(this).val();
              if(isNaN(a)){
                alert('Incorrect Detail');
                $(this).val(''); 
                return false; 
              }
            
              var max =  $(this).val((a+'%'));
              if(max.val().length > 3){
                alert('Incorrect Detail');
                max.val('');
              }
            });
            });

            

            $(document).ready(function(){
              $('.gmat_radio').click(function(){
                if($(this).prop('checked') == true){
                  $('.gmat_parent').show(300);
                }
                else{
                  $('.gmat_parent').hide(300);
                }
              })
            })

            $(document).ready(function(){
              $('.toefl_radio').click(function(){ 
                if($(this).prop('checked') == true){
                  
                  $('.toefl_select').show(300);
                }
                else{
                  $('.toefl_select').hide(300);
                }
              })
            })


            $(document).ready(function(){
              $('.ielts_radio').click(function(){
                if($(this).prop('checked') == true){
                  $('.ielts_select').show(300);
                }
                else{
                  $('.ielts_select').hide(300);
                }
              });
            });

            $(document).ready(function(){
              $('.pte_radio').click(function(){
                if($(this).prop('checked') == true){
                  $('.pte_select').show(300);
                }
                else{
                  $('.pte_select').hide(300);
                }
              });
            });

            $(document).ready(function(){
              $('.oet_radio').click(function(){
                if($(this).prop('checked') == true){
                  $('.oet_select').show(300);
                }
                else{
                  $('.oet_select').hide(300);
                }
              });
            });

            $(document).ready(function(){
              $('.visa_rejected').click(function(){
                if($(this).prop('checked') == true){
                  $('.add-visa-rejected-country,#visa_rejected_butto,#visa_rejected_minus,.add-visa-rejected-country-above').show(300);
                }
                else{
                  $('.add-visa-rejected-country,#visa_rejected_butto,#visa_rejected_minus,.add-visa-rejected-country-above').hide(300);
                  
                }
              });
            });
            




            $(document).ready(function(){
              $('#ToeflListning, #ToeflReading, #ToeflWriting, #ToeflSpeaking').change(function(){

var a = ($('#ToeflListning').val());
var b = ($('#ToeflReading').val());
var c = ($('#ToeflWriting').val());
var d = ($('#ToeflSpeaking').val());

if((a!='') && (b!='') && (c!='') && (d!=''));
{
$('#toefl_over_all').val((parseInt(a)+ parseInt(b)+parseInt(c)+ parseInt(d))/4);
}
               
              })
            })





            
$(document).ready(function(){
  $('.new_user_status').on("change", function(){ 
      var val = $(this).val();
      if((val == "Call Back Later") || (val ==  "Follow Up")){
      $('.date2').show();
      $('.time2').show();
      }
      else{
          $('.date2').hide();
      $('.time2').hide();
      }
  });
});


$('#upload_resume').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#upload_resume')[0].files[0].name;
  $(this).prev('label').text(file);
});


$('#upload_resume2').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#upload_resume2')[0].files[0].name;
  $(this).prev('label').text(file);
});



$('#file2').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#file2')[0].files[0].name;
  $(this).prev('label').text(file);
});

$('#file3').change(function() {
  var i = $(this).prev('label').clone();
  var file = $('#file3')[0].files[0].name;
  $(this).prev('label').text(file);
});

if (/Mobi/.test(navigator.userAgent)) {
  // if mobile device, use native pickers
  $(".date input").attr("type", "date");
  $(".time input").attr("type", "time");
} else {
  // if desktop device, use DateTimePicker
  // $("#datepicker").datetimepicker({
  //   useCurrent: false,
  //   format: "LL",
  //   icons: {
  //     next: "fa fa-chevron-right",
  //     previous: "fa fa-chevron-left"
  //   }
  // });
  // $("#timepicker").datetimepicker({
  //   format: "LT",
  //   icons: {
  //     up: "fa fa-chevron-up",
  //     down: "fa fa-chevron-down"
  //   }
  // });
}


$(document).ready(function(){
  $('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
      localStorage.setItem('activeTab', $(e.target).attr('href'));
  });
  var activeTab = localStorage.getItem('activeTab');
  if(activeTab){
      $('#attendance a[href="' + activeTab + '"]').tab('show');
  }
});

// let vr = document.querySelectorAll('.display-status');
// window.addEventListener('click', function() {
//   for(var a of vr){
//    if(a.nextElementSibling.style.display=="block"  ){
//     if(a.onclick == true ){
//     a.nextElementSibling.style.display="block";
//    }else{
//     a.nextElementSibling.style.display="none";
//    }
//   }
//   } 
// });
          let vr = document.querySelectorAll('.display-status');
          vr.forEach(element => { 
            
            element.addEventListener('click', function(){
for(var a of vr){
  a.nextElementSibling.style.display="none";
}

             element.nextElementSibling.style.display="block";

            })
          });
          
          
          
          
          
          


function check_checked(){
  var len = document.querySelectorAll(' input[type="checkbox"]:checked').length
  
  if(len>0){
    var sub_array = [];
    for(var i=0; i<len; i++){
      sub_array.push(document.querySelectorAll('input[type="checkbox"]:checked')[i].value);
   }
    $('#popo3').val(sub_array);
  }else{
    alert("Please Select CheckBox");
    return false;
  }
}
        