function getState(state)
{
	
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){

		if (xhr.readyState == 4 && xhr.status == 200){
			
			var result = xhr.responseText;
			document.getElementById("state").value = result; 
			
		} 
		
	}
	
	xhr.open ("GET", "./ajax/getState.php?state=" + state, true);
	xhr.send ();  
	
}