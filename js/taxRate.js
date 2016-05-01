function getTaxRate(price)
{
	
	var shippingMethod = document.getElementById("shipping").value; 
	var quantity = document.getElementById("quantity").value; 
	var state = document.getElementById("state").value; 
	
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){

		if (xhr.readyState == 4 && xhr.status == 200){
			
			var result = xhr.responseText;
			document.getElementById("totalAmount").innerHTML = result; 
			
		} 
		
	}
	
	xhr.open ("GET", "./ajax/taxRate.php?shippingMethod=" + shippingMethod + "&quantity=" + quantity + "&price=" + price + "&state=" + state, true);
	xhr.send ();  
	
}