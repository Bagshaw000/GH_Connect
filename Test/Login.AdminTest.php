<?php

class LoginTest extends \PHPUnit\Framework\TestCase
{

public function testLoginAdmin(){
    include "../Login/Login.AdminControl.php";
    $admin= new LoginContr();
    $testadmin= $admin->LoginUser();

    $this->assertTrue($testadmin);
}
public function testLoginUser(){
    

    $user= new Login/Login.AdminControl;
    $testuser= $user->LoginUser();

    $this->assertTrue($testuser);
}
}


?>