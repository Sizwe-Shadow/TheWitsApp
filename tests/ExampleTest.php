<?php

use PHPUnit\Framework\TestCase ;

final class ExampleTest extends TestCase {

    public function testGetName()
    {

        require './App/Example.php';
        //$this->assertTrue(true);

        $user = new User;

        $user->set_name('Ben');

        $this->assertEquals($user->get_name(), 'Ben');

        $user->set_name('');

        $this->assertEquals($user->get_name(), '');
    }
}
?>