<?php

use JakubPas\Exception\Handler;

/**
 * Class HandlerTest
 * @author Jakub Pas
 */
class HandlerTest extends PHPUnit_Framework_TestCase
{
    public function setUp() {
        Handler::set();
    }

    /**
     * @expectedException JakubPas\Exception\NoticeException
     */
    public function testCatchError()
    {
        $a = array();
        $b = $a[1];
        unset($b);
    }
} 