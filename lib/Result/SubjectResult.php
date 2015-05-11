<?php

namespace PhpBench\Result;

use PhpBench\Benchmark\Subject;

class SubjectResult
{
    private $subject;
    private $iterationsResults;

    public function __construct(Subject $subject, array $iterationsResults)
    {
        $this->iterationsResults = $iterationsResults;
        $this->subject = $subject;
    }

    public function getSubject() 
    {
        return $this->subject;
    }

    public function getIterationsResults() 
    {
        return $this->iterationsResults;
    }
}
