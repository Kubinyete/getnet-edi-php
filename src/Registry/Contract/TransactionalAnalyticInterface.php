<?php

namespace Kubinyete\Edi\Getnet\Registry\Contract;

use DateTimeInterface;

interface TransactionalAnalyticInterface
{
    function getRegistryType(): int;
    function getEstablishmentCode(): string;
    function getSalesSummaryNumber(): string;
    function getAcquirerNsu(): string;
    function getTransactionDate(): DateTimeInterface;
    function getCardNumber(): string;
    function getTransactionAmount(): string;
    function getWithdrawalAmount(): string;
    function getBoardingTaxAmount(): string;
    function getInstallments(): int;
    function getInstallment(): int;
    function getInstallmentAmount(): string;
    function getPaymentDate(): DateTimeInterface;
    function getAuthorizationCode(): string;
    function getCaptureMethod(): string;
    function getTransactionStatus(): string;
    function getEstablishmentCodeOrigin(): string;
    function getTerminalCode(): string;
    function getCurrencyCode(): int;
    function getCardIssuerOrigin(): string;
    function getTransactionAdjustmentSignal(): string;
    function getDigitalWallet(): string;
    function getSaleComissionAmount(): string;
    function getMetadataContentType(): string;
    function getMetadata(): string;
    function getMetadata2ContentType(): string;
    function getMetadata2(): string;
}
