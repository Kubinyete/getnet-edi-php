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

final class TransactionalAnalyticMetadataIdempKey extends TransactionalAnalyticMetadata
{
    #[Text(2), IsEqualTo('05')]
    public string $metadataType;

    #[Text(42)]
    public string $tid;
    #[Text(65)]
    public string $idempKey;

    #[Text(11)]
    public string $_padding;

    public function getMetadataType(): string
    {
        return $this->metadataType;
    }

    public function getTransactionId(): ?string
    {
        return $this->tid;
    }

    public function getIdempKey(): ?string
    {
        return $this->idempKey;
    }
}
