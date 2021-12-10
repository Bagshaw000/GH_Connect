<?php

class SignUpTest extends \PHPUnit\Framework\TestCase{

    // public function testcheckAdmin(){
    //     $newadmin= new signUp();
    //     $test= $newadmin->checkAdmin();

    //     $this->assertIsBool($test);
    // }

    // public function testcheckUser(){
    //     $newadmin= new signUp();
    //     $test= $newadmin->checkUser();

    //     $this->assertIsBool($test);
    // }

    // public function testsetAdmin(){

    //     $newadmin= new signUp();
    //     $test= $newadmin->setAdmin();

    //     $this->assertIsString($test);

    // }

    public function testsetUser(){
        $fname='test';
        $lname='test';
        $email='test@gmail.com';
        $password='123Abcd@';
        include "../"
        $newadmin= new Signup/signup.insert;
        $test= $newadmin->setUser($fname,$lname,$email,$password);

        $this->assertIsArray($test);


    }

}