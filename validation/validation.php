<?php
class validation{
    function required ($input){
        $messageError=" ";
        if(empty($input) || $input==" "){
            $messageError=" $input is required";
        }
        return $messageError;
        
    }
    function email($input){
        $input=str_replace(' ', '', $input);
        $messageError=" ";
        if (!filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $messageError=" $input invalid email format";
          }
       
        return $messageError;
        
    }
    function min($input,$length){
        $input=str_replace(' ', '', $input);
        $messageError=" ";
        if(strlen($input) < $length){
            $messageError=" $input is required to be  at least $length length ";
        }
        return $messageError;
        
    }
    function max($input,$length){
        $input=str_replace(' ','', $input);
        $messageError=" ";
        if(strlen($input)>$length){
            $messageError=" $input is required to be  at maximu $length length ";
        }
        return $messageError;
        
    }

}
$v = new validation();
$message = $v->email("afaf@gmail.com");
echo "$message"

?>