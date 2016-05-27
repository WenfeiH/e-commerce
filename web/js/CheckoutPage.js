function updateCart(productName, quantity){
    
    if (quantity.match(/[a-z]/i)){
        
        alert("Quantity Input Cannot Have Letters"); 
        return false; 
        
    }
    
    if (Number(quantity) <= 0){
        
        alert("Quantity Input Cannot Be Negative"); 
        return false; 
        
    }
    
    var updateItemServletLink = "/Project3/UpdateCart" + "?productName=" + productName + "&quantity=" + quantity; 
    
    document.location.href = updateItemServletLink; 
    
}

function removeItem(productName){
    
    var removeItemServletLink = "/Project3/RemoveItem" + "?productName=" + productName; 
    
    document.location.href = removeItemServletLink; 
    
}
