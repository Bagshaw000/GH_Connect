<?php

include "../Admindashboard/Admindashboard.productDelete.php";

class AdminDashboardTest extends \PHPUnit\Framework\TestCase
{

public function testDeleteProduct(){
$testDelete= new deleteProduct();
 $delete =$testDelete->deleteProduct();
$this->assertEmpty($delete);
}

public function updateDeleteProduct(){
    
}
}