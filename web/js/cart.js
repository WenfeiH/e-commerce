function addToCart(productName) {
    var quantity = document.getElementById("quantity").value;
    
    if(quantity <= 0)
        return;
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var result = xhr.responseText;
            //alert(result);
            if(result >= quantity)
                document.getElementById("cart").innerHTML = "Cart(" + quantity + ")";
        }
    };
    
    xhr.open("POST", "/Project3/Cart", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("name=" + productName + "&quantity=" + quantity);
}