<?php
    
    function parseName($name) {
        $names = explode(" ", $name);
        if(count($names) == 2){
            return ( $names[0]."_".$names[1] );
        }	
        else{
            return ( $names[0]."_".$names[1]."_".$names[2] );
        }			
    }

    function saveorder(){
        $sql = "INSERT INTO sales (firstName,lastName,email,phoneNumber,quantity,shipping,address,zipCode,city,state,country,cardType,cardNumber,securityCode,nameOnCard) "
                . "VALUES (:firstName,:lastName,:email,:phoneNumber,:quantity,:shipping,:address,:zipCode,:city,:state,:country,:cardType,:cardNumber,:securityCode,:nameOnCard)";
        $stmt = $link->prepare($sql);
        $stmt->execute(array(':firstName' => $_POST['firstName'],':lastName' => $_POST['lastName'],':email' => $_POST['email'],
                        ':phoneNumber' => $_POST['phoneNumber'],':quantity' => $_POST['quantity'],':shipping' => $_POST['shipping'],
                        ':address' => $_POST['address'],':zipCode' => $_POST['zipCode'],':city' => $_POST['city'],
                        ':state' => $_POST['state'],':country' => $_POST['country'],':cardType' => $_POST['cardType'],
                        ':cardNumber' => $_POST['cardNumber'],':securityCode' => $_POST['securityCode'],':nameOnCard' => $_POST['nameOnCard']));
        echo $sql;
    }

?>