<?php

declare(strict_types = 1);

namespace Tests\unit;

use PHPUnit\Framework\TestCase;
use ReflectionClass;
use SocialPost\Dto\SocialPostTo;
use Statistics\Calculator\AveragePostLength;

/**
 * Class AveragePostLengthPerMonthTest
 *
 * @package Tests\unit
 */

class AveragePostLengthPerMonthTest extends TestCase
{

    const RESULT = 26;


    protected static function getMethod($class, $name) {
      $class = new ReflectionClass($class);
      $method = $class->getMethod($name);
      $method->setAccessible(true);
      return $method;
    }

    /**
     * @test
     */
    public function testAverage()
    {
        $foo = self::getMethod('Statistics\Calculator\AveragePostLength', 'doAccumulate');
        $foo2 = self::getMethod('Statistics\Calculator\AveragePostLength', 'doCalculate');
        $average_per_month = new AveragePostLength();

        $posts = $this->decoratePosts();
        foreach ($posts as $post){
             $foo->invokeArgs($average_per_month, array($post));
        }

        $this->assertTrue($foo2->invokeArgs($average_per_month, array())->getValue() == self::RESULT);
    }

    public function decoratePosts(){

        $post1 = new SocialPostTo();
        $post1->setAuthorId('user_7');
        $post1->setAuthorName('Gigi Richter');
        $post1->setDate(new \DateTime());
        $post1->setText('smell tile pit coincidence');
        $post1->setId('post5dcd909807373_45afa260');
        $post1->setType('status');

        $post2 = new SocialPostTo();
        $post2->setAuthorId('user_7');
        $post2->setAuthorName('Gigi Richter');
        $post2->setDate(new \DateTime());
        $post2->setText('smell tile pit coincidence');
        $post2->setId('post5dcd909807373_45afa260');
        $post2->setType('status');

        $post3 = new SocialPostTo();
        $post3->setAuthorId('user_7');
        $post3->setAuthorName('Gigi Richter');
        $post3->setDate(new \DateTime());
        $post3->setText('smell tile pit coincidence');
        $post3->setId('post5dcd909807373_45afa260');
        $post3->setType('status');

        return [$post1, $post2, $post3];

    }
}
