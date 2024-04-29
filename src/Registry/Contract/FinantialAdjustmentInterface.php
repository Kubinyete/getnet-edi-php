<?php

namespace Kubinyete\Edi\Getnet\Registry\Contract;

use DateTimeInterface;

interface FinantialAdjustmentInterface
{
    function getRegistryType(): int;
    function getEstablishmentCode(): string;
    function getSalesSummaryNumber(): string;
    function getSalesSummaryDate(): DateTimeInterface;
    function getSalesSummaryPaymentDate(): DateTimeInterface;
    function getAdjustmentId(): string;
    function getWhiteSpace(): string;
    function getAdjustmentSignal(): string;
    function getAdjustmentAmount(): string;
    function getAdjustmentReasonCode(): string;
    function getLetterDate(): DateTimeInterface;
    function getCardNumber(): string;
    function getSalesSummaryNumberOriginal(): string;
    function getAcquirerNsu(): string;
    function getTransactionDateOriginal(): DateTimeInterface;
    function getPaymentTypeIndicator(): string;
    function getTerminalCodeOriginal(): string;
    function getPaymentDateOriginal(): ?DateTimeInterface;
    function getCurrencyCode(): int;
    function getSaleComissionAmount(): string;
    function getMetadataContentType(): string;
    function getMetadata(): string;
}
