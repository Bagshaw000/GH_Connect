<?php

class Test extends \PHPUnit\Framework\TestCase
{

public function testThatStringMatch(){
    $string='t';
    $strin1='t';

    $this->assertSame($strin1,$string);
}
}