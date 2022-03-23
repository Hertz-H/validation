<?php
class validation{
    private $errors = array();
    private $inputName="";
    private $value="";
    
    function isValid (){
        if(empty($this->errors)){
            return true;
        }
        return false;
    }
    function getErrors (){
        return $this->errors;
    }
    function setInputName ($inputName){
        $this->inputName=$inputName;
        return $this;
    }
    function setValue ($value){
        $this->value=$value;
        return $this;
    }

    function required (){
       
     
      $this->filterWhiteSpace();
        if(empty($this->value)){
          
            $this->errors[$this->inputName]= $this->inputName.'is required';
        }
        return $this ;
        
    }
    function email(){
     $this->filterWhiteSpace();
  
        if (!filter_var($this->value, FILTER_VALIDATE_EMAIL)) {
            $this->errors[$this->inputName]=$this->inputName.'is not a valid ';
        }
        return $this ;
        
    }
    function min($length){
       $this->filterWhiteSpace();
  
        if(strlen($this->value)< $length){
           
            $this->errors[$this->inputName]=$this->inputName.'must be at least '.$length."length";
        }
        return $this ;
        
    }
    function max($length){
        $this->filterWhiteSpace();
   
         if(strlen($this->value)> $length){
            
             $this->errors[$this->inputName]=$this->inputName.'must be at most '.$length."length";
         }
         return $this ;
         
     }
    function filterWhiteSpace(){
        $this->value=str_replace(' ', '', $this->value);
        
    }

}
$v = new validation();
// $v->inputName="name";
// $v->value=" afaf";
// $v->inputName="email";
// $v->value=" afaf@g.com";
// $v= $v->setInputName("name")->required();
// $v= $v->setInputName("email")->setValue("afaf@g.com")->required()->email();
// $v= $v->setInputName("email")->setValue("afaf@g.com")->required()->min(2)->max(20);
// if(!$v->isValid()){
//     print_r($v->getErrors());
// }
// else {
//     echo "valid";
// }
// if($isValid){
//     echo "valid" ;
// }
// else {
//     echo "not valid" ;
// }

?>