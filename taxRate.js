function getTaxRate(price)
{
	
	var shippingMethod = document.getElementById("shipping").value; 
	var quantity = document.getElementById("quantity").value; 
	
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function(){

		if (xhr.readyState == 4 && xhr.status == 200){
			
			var result = xhr.responseText;
			document.getElementById("totalAmount").innerHTML = result; 
			
		} 
		
	}
	
	xhr.open ("GET", "taxRate.php?shippingMethod=" + shippingMethod + "&quantity=" + quantity + "&price=" + price, true);
	xhr.send ();  
	
}