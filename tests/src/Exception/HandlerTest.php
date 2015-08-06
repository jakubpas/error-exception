<?php

/**
 * Class HandlerTest
 * @author Jakub Pas
 */
class HandlerTest {

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