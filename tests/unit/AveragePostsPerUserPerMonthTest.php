<?php
declare(strict_types=1);


namespace Tests\unit;

use Statistics\Calculator\NoopCalculator;

class AveragePostsPerUserPerMonthTest extends BaseTestCase {

     const RESULT = 3;
    /**
     * @test
     */
    public function testAveragePostsPerUserPerMonth()
    {
        $foo = self::getMethod('Statistics\Calculator\NoopCalculator', 'doAccumulate');
        $foo2 = self::getMethod('Statistics\Calculator\NoopCalculator', 'doCalculate');
        $average_per_month = new NoopCalculator();

        $posts = $this->__decoratePosts();
        foreach ($posts as $post){
             $foo->invokeArgs($average_per_month, array($post));
        }

        $this->assertTrue($foo2->invokeArgs($average_per_month, array())->getValue() == self::RESULT);
    }
}