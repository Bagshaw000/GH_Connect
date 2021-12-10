<?php 
//This file carry out the validation
include 'Review.Insert.php';

class reviewControl extends reviewAdd{
private $name;
private $review;
private $business_id;


function __construct($name,$review,$business_id){
    $this->name= $name;
    $this->review= $review;
    $this->business_id= $business_id;
}

function emptyInput(){
    $result='';
    if(empty($this->name)||empty($this->review)){
        return $result=false;
    }
    else{
        $result=true;
    }
    return $result;


}
//This validate the input before writing it to the database
function validateInput(){
    if($this->emptyInput()==false){
        header('location: ../MainInterface/Review.php?error=emptyinput');
        exit();
    }
    $insert = new reviewAdd();
    $insert->insertReview($this->name,$this->review,$this->business_id);
}





}