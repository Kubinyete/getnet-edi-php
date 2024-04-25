<?php

namespace Kubinyete\Edi\Getnet\Reader;

use Throwable;
use Kubinyete\Edi\Parser\LineParser;
use Kubinyete\Edi\Registry\Registry;
use Kubinyete\Edi\Parser\LineContext;
use Kubinyete\Edi\Getnet\Registry\Header;
use Kubinyete\Edi\Getnet\Registry\Trailer;
use Kubinyete\Edi\Getnet\Registry\FinantialDetail;
use Kubinyete\Edi\Getnet\Registry\FinantialSummary;
use Kubinyete\Edi\Registry\Exception\FieldException;
use Kubinyete\Edi\Getnet\Registry\FinantialAdjustment;
use Kubinyete\Edi\Getnet\Registry\TransactionalSummary;
use Kubinyete\Edi\Getnet\Registry\TransactionalAnalytic;

final class Parser extends LineParser
{
    protected function parse(LineContext $context): ?Registry
    {
        $buffer = $context->getContents();
        $type = substr($buffer, 0, 1);

        try {
            return match ($type) {
                '0' => Header::from($buffer),
                '1' => TransactionalSummary::from($buffer),
                '2' => TransactionalAnalytic::from($buffer),
                '3' => FinantialAdjustment::from($buffer),
                '4' => $context->raise("Registry type '$type' cannot be handled"), // @TODO: Anticipation
                '5' => FinantialSummary::from($buffer),
                '6' => FinantialDetail::from($buffer),
                '9' => Trailer::from($buffer),
                ''  => null, // Last empty line before EOF
                default => $context->raise("Unexpected registry type '$type', panic!")
            };
        } catch (FieldException $e) {
            $context->raise("[{$e->getName()}] {$e->getMessage()}", $e->getCursor());
        }
    }
}
