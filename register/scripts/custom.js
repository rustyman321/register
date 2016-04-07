$(document).ready(function() {
		    $("#pin").keydown(function (e) {
		        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
		            (e.keyCode == 65 && ( e.ctrlKey === true || e.metaKey === true ) ) || 
		            (e.keyCode >= 35 && e.keyCode <= 40)) {
		                 return;
		        }
		        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
		            e.preventDefault();
		        }
		 });

	$("#submit").click(function(){
		if($("#pin").val().length<7 && $("#pin").val().length>0 ){
        	alert("Personal Identification Number must contain 7 digits");
        	$(function() {
			  $("#pin").focus();
			});
        	return false;
    	}
	});
	$("#reset").click(function(){
		$('#pin').val("");
		$('#fname').val("");
		$('#lname').val("");
		$('#title').val("mr");
		$('#citizenship').val("PHL");
		$('.radio').prop('checked', false);
		$('#comment').val("");
	});
	var parts = window.location.search.substr(1).split("&");

	var $_GET = {};
	for (var i = 0; i < parts.length; i++) {
	    var temp = parts[i].split("=");
	    $_GET[decodeURIComponent(temp[0])] = decodeURIComponent(temp[1]);
	}

	if(typeof $_GET['success'] != 'undefined'){
		jQuery("#result-notif").append("<strong>Success!</strong><br/>Registration Successful!");
		jQuery("#result-notif").addClass("alert alert-success");
	}else if(typeof $_GET['error'] != 'undefined'){
		jQuery("#result-notif").append("<strong>Error!</strong><br/>PIN already registered!");
		jQuery("#result-notif").addClass("alert alert-danger");
	}




});