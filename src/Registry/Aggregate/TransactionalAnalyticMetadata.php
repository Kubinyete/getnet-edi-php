<?php

namespace Kubinyete\Edi\Getnet\Registry\Aggregate;

use Kubinyete\Edi\Getnet\Registry\Registry;
use Kubinyete\Edi\Getnet\Registry\Contract\TransactionalAnalyticMetadataInterface;

abstract class TransactionalAnalyticMetadata extends Registry implements TransactionalAnalyticMetadataInterface
{
    public function getOrderId(): ?string
    {
        return null;
    }

    public function getChargeId(): ?string
    {
        return null;
    }

    public function getRecurringBillNumber(): ?string
    {
        return null;
    }

    public function getTransactionId(): ?string
    {
        return null;
    }

    public function getSoftdescriptor(): ?string
    {
        return null;
    }

    public function getIdempKey(): ?string
    {
        return null;
    }

    public function getAirlinesEntryAmount(): ?string
    {
        return null;
    }
}
