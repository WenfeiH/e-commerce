function decrementBeforeUnload(productName)
{
	
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){

		if (xhr.readyState === 4 && xhr.status === 200){
			
                        ; 
			
		} 
		
	}
	
	xhr.open ("GET", "/Project3/DecrementCustomerViewProduct?productName=" + productName, true);
	xhr.send ();  
	
}

window.onbeforeunload = function () {
    
    var productName = document.getElementById("product").innerHTML; 
    
    decrementBeforeUnload(productName); 
    
}