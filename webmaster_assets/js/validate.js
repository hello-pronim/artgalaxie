
function confirm_delete(){
	var checked=false;
	var records;
	elements=document.getElementsByName("cb[]");
	for(var i=0; i < elements.length; i++){
		if(elements[i].checked){
			checked = true;
		}
	}
	
	if (!checked) {
		alert('Please select at least 1 record to delete');
	}
	else{
		checked= confirm("Are you sure to delete?")
	}
	return checked;
}

$( document ).ready(function() {
	$('.numberonly').keydown(function(e){
		var key = e.charCode || e.keyCode || 0;
		//key == 110 || for '.'
		// allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
		// home, end, period, and numpad decimal
		return (
			key == 8 || 
			key == 9 ||
			key == 13 ||
			key == 46 ||
			key == 190 ||
			(key >= 35 && key <= 40) ||
			(key >= 48 && key <= 57) ||
			(key >= 96 && key <= 105));
	});
});