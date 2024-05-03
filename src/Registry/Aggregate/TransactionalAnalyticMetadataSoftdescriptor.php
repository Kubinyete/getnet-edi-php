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

final class TransactionalAnalyticMetadataSoftdescriptor extends TransactionalAnalyticMetadata
{
    #[Text(2), IsEqualTo('04')]
    public string $metadataType;

    #[Text(25)]
    public string $softdescriptor;

    #[Text(93)]
    public string $_padding;

    public function getMetadataType(): string
    {
        return $this->metadataType;
    }

    public function getSoftdescriptor(): ?string
    {
        return $this->softdescriptor;
    }
}
