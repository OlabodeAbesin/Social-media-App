<?php
declare(strict_types=1);


namespace Tests\unit;


use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
use SocialPost\Dto\SocialPostTo;

class BaseTestCase extends TestCase {

    /**
     * @throws ReflectionException
     */
    protected static function getMethod($class, $name): \ReflectionMethod {
      $class = new ReflectionClass($class);
      $method = $class->getMethod($name);
      $method->setAccessible(true);
      return $method;
    }

    protected function __decoratePosts(): array {

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