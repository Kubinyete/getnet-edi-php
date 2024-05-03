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

final class TransactionalAnalyticMetadataEcommerce extends TransactionalAnalyticMetadata
{
    #[Text(2), IsEqualTo('02')]
    public string $metadataType;

    #[Text(42)]
    public string $tid;
    #[Text(36)]
    public string $orderId;

    #[Text(40)]
    public string $_padding;

    public function getMetadataType(): string
    {
        return $this->metadataType;
    }

    public function getTransactionId(): ?string
    {
        return $this->tid;
    }

    public function getOrderId(): ?string
    {
        return $this->orderId;
    }
}
