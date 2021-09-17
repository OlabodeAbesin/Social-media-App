<?php

declare(strict_types = 1);

namespace Statistics\Calculator;
use SocialPost\Dto\SocialPostTo;
use Statistics\Dto\StatisticsTo;

class NoopCalculator extends AbstractCalculator
{
    protected const UNITS = 'posts';
    /**
     * @var int
     */
    private $postCount = 0;

    /**
     * @var array
     */
    private $unique_authors = [];


    /**
     * @inheritDoc
     */
    protected function doAccumulate(SocialPostTo $postTo): void
    {
        $this->postCount++;
        $key = $postTo->getAuthorId();

        if (!in_array($key, $this->unique_authors))
        {
            $this->unique_authors[] = $key;
        }
    }

    /**
     * @inheritDoc
     */
    protected function doCalculate(): StatisticsTo
    {
        $value = $this->postCount > 0
            ? $this->postCount / count($this->unique_authors)
            : 0;

        return (new StatisticsTo())->setValue(round($value,2));
    }
}
