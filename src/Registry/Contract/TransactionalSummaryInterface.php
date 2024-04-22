<?php

namespace Kubinyete\Edi\Getnet\Registry\Contract;

use DateTimeInterface;

interface TransactionalSummaryInterface
{
    function getRegistryType(): int;
    function getEstablishmentCode(): string;
    function getProductCode(): string;
    function getCaptureMethod(): string;
    function getSalesSummaryNumber(): string;
    function getSalesSummaryDate(): DateTimeInterface;
    function getSalesSummaryPaymentDate(): DateTimeInterface;
    function getBankCode(): string;
    function getBankAgency(): string;
    function getCheckingAccount(): string;
    function getSalesAcceptedQuantity(): int;
    function getSalesRejectedQuantity(): int;
    function getGrossAmount(): string;
    function getAmount(): string;
    function getFareAmount(): string;
    function getDiscountRateAmount(): string;
    function getTotalRejectedAmount(): string;
    function getTotalCreditAmount(): string;
    function getChargesAmount(): string;
    function getPaymentTypeIndicator(): string;
    function getSalesSummaryInstallment(): int;
    function getSalesSummaryInstallments(): int;
    function getEstablishmentCodeOrigin(): string;
    function getAnticipationOperationNumber(): string;
    function getDueDateOriginal(): DateTimeInterface;
    function getOperationCost(): string;
    function getSalesSummaryAnticipationAmount(): string;
    function getChargeControlNumber(): string;
    function getChargeAmount(): string;
    function getCompensationId(): string;
    function getCurrencyCode(): int;
    function getChargeWriteOffIdentifier(): string;
    function getTransactionAdjustmentSignal(): string;
    function getAccountTypeForPayment(): string;
    function getAccountNumberForPayment(): string;
    function getReceivableUnitId(): string;
}
