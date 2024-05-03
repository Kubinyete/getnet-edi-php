<?php

namespace Kubinyete\Edi\Getnet\Registry\Aggregate;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Field;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;
use Kubinyete\Edi\Getnet\Registry\Registry;
use Kubinyete\Edi\Registry\Field\IsEqualTo;

final class TransactionalAnalyticMetadataRecurringTid extends TransactionalAnalyticMetadata
{
    #[Text(2), IsEqualTo('03')]
    public string $metadataType;

    #[Text(36)]
    public string $orderId;
    #[Text(36)]
    public string $chargeId;
    #[Text(3)]
    public string $recurringChargeId;
    #[Text(42)]
    public string $tid;

    #[Text(1)]
    public string $_padding;

    public function getMetadataType(): string
    {
        return $this->metadataType;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }

    public function getChargeId(): ?string
    {
        return $this->chargeId;
    }

    public function getRecurringBillNumber(): ?string
    {
        return $this->recurringChargeId;
    }

    public function getTid(): ?string
    {
        return $this->tid;
    }
}
