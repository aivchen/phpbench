<?php

namespace PhpBench\Benchmark\Asserter;

use PhpBench\Benchmark\AsserterInterface;
use Hoa\Ruler\Ruler;
use Hoa\Ruler\Context;
use PhpBench\Math\Distribution;
use PhpBench\Benchmark\Assertion;
use PhpBench\Benchmark\AssertionFailure;

class RulerAsserter implements AsserterInterface
{
    private $ruler;

    public function __construct(Ruler $ruler = null)
    {
        $this->ruler = $ruler ?: new Ruler();
    }

    public function assert(string $expression, Distribution $distribution)
    {
        $context = ['stats' => new \stdClass()];
        foreach ($distribution->getStats() as $key => $value) {
            $context['stats']->$key = $value;
        }

        if (false === $this->ruler->assert($expression, new Context($context))) {
            throw new AssertionFailure($expression, $context);
        }
    }
}
