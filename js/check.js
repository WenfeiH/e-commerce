function check() {
    clear_alert();
    var txt1 = "Please fill in the blank";
    var txt2 = "Please check your credit card number";
    var txt3 = "Please choose one";
    var txt4 = "Please check your security code";
    var hasProblem = false;

    if (document.getElementById('firstname').value === "" ||
        document.getElementById('lastname').value === "" ||
        document.getElementById('email').value === "" ||
        document.getElementById('phone').value === "" ||
        document.getElementById('quantity').value < 1 ||
        document.getElementById('shipping').value === "" ||
        document.getElementById('lin1').value === "" ||         
        document.getElementById('postal').value === "" ||
        document.getElementById('city').value === "" ||
        document.getElementById('state').value === "" ||
        document.getElementById('country').value === "" ||
        document.getElementById('cardnum').value === "" ||
        document.getElementById('secure').value === "" ||
        document.getElementById('holder').value === "" ){
        alert("Please complete all the required fields.");
        hasProblem = true;

        if(document.getElementById('firstname').value === ""){
            document.getElementById("firstnamealert").innerHTML = txt1;
        } else {
            document.getElementById("firstnamealert").innerHTML = "";
        }

        if(document.getElementById('lastname').value === ""){
            document.getElementById("lastnamealert").innerHTML = txt1;
        } else {
            document.getElementById("lastnamealert").innerHTML = "";
        }
        
        if(document.getElementById('email').value === ""){
            document.getElementById("emailalert").innerHTML = txt1;   
        }else{
            document.getElementById("emailalert").innerHTML ="";
        }       
        
        if(document.getElementById('phone').value === ""){
            document.getElementById("phonealert").innerHTML = txt1;
        }else{
            document.getElementById("phonealert").innerHTML ="";
        }        
        
        if(document.getElementById('quantity').value < 1) {
            document.getElementById("quantityalert").innerHTML = "Please provide a quantity"; 
        } else {
            document.getElementById("quantityalert").innerHTML = "";
        }

        if(document.getElementById('shipping').value === ""){
            document.getElementById("shippingalert").innerHTML = txt3;
        }else{
            document.getElementById("shippingalert").innerHTML ="";
        }  
        
        if(document.getElementById('lin1').value === ""){
            document.getElementById("lin1alert").innerHTML = txt1;
        }else{
            document.getElementById("lin1alert").innerHTML ="";
        }  
        
        if(document.getElementById('postal').value === ""){
            document.getElementById("postalalert").innerHTML = txt1;
        }else{
            document.getElementById("postalalert").innerHTML ="";
        }    
        
        if(document.getElementById('city').value === ""){
            document.getElementById("cityalert").innerHTML = txt1;
        }else{
            document.getElementById("cityalert").innerHTML ="";
        }
        
        if(document.getElementById('state').value === ""){
            document.getElementById("statealert").innerHTML = txt1;
        }else{
            document.getElementById("statealert").innerHTML ="";
        }
        
        if(document.getElementById('country').value === ""){
            document.getElementById("countryalert").innerHTML = txt1;
        }else{
            document.getElementById("countryalert").innerHTML ="";
        }
        
        if(document.getElementById('cardnum').value === ""){
            document.getElementById("cardnumalert").innerHTML = txt1;
        }else{
            document.getElementById("cardnumalert").innerHTML = "";   
        }
        
        if(document.getElementById('secure').value === ""){
            document.getElementById("securealert").innerHTML = txt1;
        }else{
            document.getElementById("securealert").innerHTML = "";
        }
        
        if(document.getElementById('holder').value === ""){
            document.getElementById("holderalert").innerHTML = txt1;
        }else{
            document.getElementById("holderalert").innerHTML ="";
        }   
    } 
    else {

        clear_alert();

        if (!nameCheck(document.getElementById('firstname').value)){
            document.getElementById("firstnamealert").innerHTML ="First Name can only contain Alphabetical Characters and Spaces. (No Numbers, Symbols, etc.)"; 
            hasProblem = true;
        }
        else{
            document.getElementById("firstnamealert").innerHTML ="";
        }

        if (!nameCheck(document.getElementById('lastname').value)){
            document.getElementById("lastnamealert").innerHTML ="Last Name can only contain Alphabetical Characters and Spaces. (No Numbers, Symbols, etc.)"; 
            hasProblem = true
        }
        else{
            document.getElementById("lastnamealert").innerHTML ="";
        }

        if(!validateEmail(document.getElementById('email').value)) {
            document.getElementById("emailalert").innerHTML = "Email address is not in correct form.";
            hasProblem = true;
        } else {
            document.getElementById("emailalert").innerHTML = "";
        }

        if (!isNumeric(document.getElementById('phone').value)){
            document.getElementById("phonealert").innerHTML ="Phone Number can only contain Numbers. (No Letters, Spaces, Symbols, etc.)"; 
            hasProblem = true;
        } else if(document.getElementById('phone').value.length != 10) {
            document.getElementById("phonealert").innerHTML = "Phone number should be 10-digit long."
            hasProblem = true;
        }else{
            document.getElementById("phonealert").innerHTML ="";
        }

        if (!isNumeric(document.getElementById('postal').value)){
            document.getElementById("postalalert").innerHTML ="Postcode can only contain Numbers. (No Letters, Spaces, Symbols, etc.)"; 
            hasProblem = true;
        }else if(document.getElementById('postal').value.length != 5){
            document.getElementById("postalalert").innerHTML ="Please provide a US post code with 5 digits."; 
            hasProblem = true;
        }else{
            document.getElementById("postalalert").innerHTML ="";
        }

        if (!isNumeric(document.getElementById('cardnum').value)){
            document.getElementById("cardnumalert").innerHTML ="Credit Card Number can only contain Numbers. (No Letters, Spaces, Symbols, etc.)"; 
            hasProblem = true;
        }else if(document.getElementById('cardnum').value.length!==16){
            document.getElementById("cardnumalert").innerHTML = txt2;
            hasProblem = true;
        }else{
            document.getElementById("cardnumalert").innerHTML = "";
        }   

        if(document.getElementById("American Express").checked===true){
            if(document.getElementById('secure').value.length!==4){
                document.getElementById("securealert").innerHTML = txt4;
                hasProblem = true;
            } 
            else{
                document.getElementById("securealert").innerHTML = "";
            }
        }else{      
            if(document.getElementById('secure').value.length!==3){
                document.getElementById("securealert").innerHTML = txt4;
                hasProblem = true;
            } 
            else{
                document.getElementById("securealert").innerHTML = "";
            }
        }

        if(!nameCheck(document.getElementById('holder').value)){
            document.getElementById("holderalert").innerHTML = "Holder's Name can only contain Alphabetical Characters and Spaces. (No Numbers, Symbols, etc.)";
            hasProblem = true;
        }else{
            document.getElementById("holderalert").innerHTML ="";
        }
    }
    
    return !hasProblem; 

}
function clear_alert(){
    document.getElementById("firstnamealert").innerHTML ="";
    document.getElementById("lastnamealert").innerHTML ="";
    document.getElementById("emailalert").innerHTML ="";
    document.getElementById("phonealert").innerHTML ="";        
    document.getElementById("shippingalert").innerHTML ="";
    document.getElementById("lin1alert").innerHTML = "";
    document.getElementById("postalalert").innerHTML = "";
    document.getElementById("cityalert").innerHTML = "";
    document.getElementById("statealert").innerHTML = "";
    document.getElementById("countryalert").innerHTML = "";
    document.getElementById("cardnumalert").innerHTML = "";
    document.getElementById("securealert").innerHTML = "";
    document.getElementById("holderalert").innerHTML = "";
}

function email(){
    var product = "Product:%20"+document.getElementById("product").textContent;
    var price = "%0D%0A"+document.getElementById("price").textContent;   
    var quantity = "%0D%0AQuantity:%20" + document.getElementById('quantity').value;  
    var shipping = "%0D%0AShipping%20Method:%20" + document.getElementById('shipping').value;    
    var name = "%0D%0ACustomer:%20"+document.getElementById("firstname").value + "%20" + document.getElementById("lastname").value;
    var email = "%0D%0AEmail:%20"+document.getElementById("email").value;
    var phone = "%0D%0APhone:%20"+document.getElementById("phone").value;
    var address = "%0D%0AShipping%20Address:%20" + document.getElementById("lin1").value + "%20" + document.getElementById("lin2").value + ",%20" + document.getElementById("city").value + ",%20" + document.getElementById("state").value;
    var cardnum = "%0D%0ACredit%20Card:%20" + document.getElementById('cardnum').value;
    var secure = "%0D%0ASecurity%20Code:%20" + document.getElementById('secure').value;
    var holder = "%0D%0ACard%20Holder:%20" + document.getElementById('holder').value;
    
    var link = "mailto:ccson@uci.edu?subject=Product%20Purchase%20Form&body=";
    var body = product+price+quantity+shipping+name+email+phone+address+cardnum+secure+holder; 
    window.open(link + body); 
}

function hasCharacter(string){
    return /\S/.test(string); 	
}

function nameCheck(string){	
    var alphabetical = /^[A-Za-z ]+$/;  
    return string.match(alphabetical); 	
}

function isNumeric(string){
    var numeric = /^\d+$/;
    return string.match(numeric); 	
}

function validateEmail(email) 
{
    var re = /\S+?@\S+?\.[^\s@\.]+/;
    return re.test(email);
}