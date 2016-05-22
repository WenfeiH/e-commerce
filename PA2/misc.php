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

?>