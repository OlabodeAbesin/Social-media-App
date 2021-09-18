<?php

declare(strict_types = 1);

namespace Tests\unit;


use ReflectionException;
use Statistics\Calculator\AveragePostLength;

/**
 * Class AveragePostLengthPerMonthTest
 *
 * @package Tests\unit
 */

class AveragePostLengthPerMonthTest extends BaseTestCase
{

    const RESULT = 26;

    /**
     * @test
     * @throws ReflectionException
     */
    public function testAverageLength()
    {
        $foo = self::getMethod('Statistics\Calculator\AveragePostLength', 'doAccumulate');
        $foo2 = self::getMethod('Statistics\Calculator\AveragePostLength', 'doCalculate');
        $average_per_month = new AveragePostLength();

        $posts = $this->__decoratePosts();
        foreach ($posts as $post){
             $foo->invokeArgs($average_per_month, array($post));
        }

        $this->assertTrue($foo2->invokeArgs($average_per_month, array())->getValue() == self::RESULT);
    }

}
