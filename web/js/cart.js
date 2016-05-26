function addToCart(productName) {
    var quantity = document.getElementById("quantity").value;
    
    if(quantity <= 0)
        return;
    
    displayCartSize(productName, quantity);
}

function displayCartSize(productName, quantity) {
    
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            var result = xhr.responseText;
            
            if(result > 0 && result >= quantity)
                document.getElementById("cart").innerHTML = "Cart(" + result + ")";
        }
    };
    
    xhr.open("POST", "/Project3/Cart", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    if(quantity === 0)
        xhr.send("");
    else
        xhr.send("name=" + productName + "&quantity=" + quantity);
}

window.onload = function() {
    displayCartSize("", 0);
};