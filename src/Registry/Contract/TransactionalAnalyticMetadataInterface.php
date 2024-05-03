<?php

namespace Kubinyete\Edi\Getnet\Registry\Contract;

interface TransactionalAnalyticMetadataInterface
{
    function getMetadataType(): string;
    function getOrderId(): ?string;
    function getChargeId(): ?string;
    function getRecurringBillNumber(): ?string;

    function getTransactionId(): ?string;
    function getSoftdescriptor(): ?string;
    function getIdempKey(): ?string;

    function getAirlinesEntryAmount(): ?string;
}
