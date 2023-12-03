<?php

namespace PhpBench\Expression\Parselet;

use PhpBench\Expression\Ast\ArithmeticOperatorNode;
use PhpBench\Expression\Ast\Node;
use PhpBench\Expression\InfixParselet;
use PhpBench\Expression\Parser;
use PhpBench\Expression\Tokens;

class ArithmeticOperatorParselet implements InfixParselet
{
    public function __construct(private readonly string $tokenType, private readonly int $precedence)
    {
    }

    public function tokenType(): string
    {
        return $this->tokenType;
    }

    public function parse(Parser $parser, Node $left, Tokens $tokens): Node
    {
        $binaryOperator = $tokens->chomp();
        $right = $parser->parseExpression($tokens, $this->precedence);

        return new ArithmeticOperatorNode($left, $binaryOperator->value, $right);
    }

    public function precedence(): int
    {
        return $this->precedence;
    }
}
