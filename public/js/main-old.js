$(document).ready(function(){
	$('a[data-toggle="tab"]').on('show.bs.tab', function(e) {
		localStorage.setItem('activeTab', $(e.target).attr('href'));
	});
	var activeTab = localStorage.getItem('activeTab');
	if(activeTab){
		$('#myTab a[href="' + activeTab + '"]').tab('show');
	}
});



// get real time image



function GetFileSize1(input) {
	var fi = document.getElementById('file1'); // GET THE FILE INPUT.

	// VALIDATE OR CHECK IF ANY FILE IS SELECTED.
	if (fi.files.length > 0) {
		// RUN A LOOP TO CHECK EACH SELECTED FILE.
		for (var i = 0; i <= fi.files.length - 1; i++) {

			var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
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
				//     '<b>' + Math.round((fsize / 1024)) + '</b> KB';
		}
	}
}








function GetFileSize2(input) {
	var fi = document.getElementById('file2'); // GET THE FILE INPUT.

	// VALIDATE OR CHECK IF ANY FILE IS SELECTED.
	if (fi.files.length > 0) {
		// RUN A LOOP TO CHECK EACH SELECTED FILE.
		for (var i = 0; i <= fi.files.length - 1; i++) {

			var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
if(fsize >2097152){
alert('max');
return false;

}
else{
if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function (e) {
	  $('#img2')
		  .attr('src', e.target.result)
		  .width(182)
		  .height(184);
  };

  reader.readAsDataURL(input.files[0]);
}
}
			// document.getElementById('result').innerHTML = fsize;
				// document.getElementById('result').innerHTML + '<br /> ' +
				//     '<b>' + Math.round((fsize / 1024)) + '</b> KB';
		}
	}
}




function GetFileSize3(input) {
	var fi = document.getElementById('file3'); // GET THE FILE INPUT.

	// VALIDATE OR CHECK IF ANY FILE IS SELECTED.
	if (fi.files.length > 0) {
		// RUN A LOOP TO CHECK EACH SELECTED FILE.
		for (var i = 0; i <= fi.files.length - 1; i++) {

			var fsize = fi.files.item(i).size;      // THE SIZE OF THE FILE.
if(fsize >2097152){
alert('max');
return false;

}
else{
if (input.files && input.files[0]) {
  var reader = new FileReader();

  reader.onload = function (e) {
	  $('#img3')
		  .attr('src', e.target.result)
		  .width(182)
		  .height(184);
  };

  reader.readAsDataURL(input.files[0]);
}
}
			// document.getElementById('result').innerHTML = fsize;
				// document.getElementById('result').innerHTML + '<br /> ' +
				//     '<b>' + Math.round((fsize / 1024)) + '</b> KB';
		}
	}
}






function hide_marriage(){
	document.getElementById('k0check2').style.display="none";
	  }
	  function show_marriage(){
		document.getElementById('k0check2').style.display="block";
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
	// 		$('#enquiry').submit(function(e){
	// 			var name                =	$('[name="name"]').value();
	// 			alert(name);
	// 			return false;
	// 		})
	// });

// 	$(document).ready(function(){
// $(".nav-link").click(function(event){
// 	$(this).hide();
// });

// 	}