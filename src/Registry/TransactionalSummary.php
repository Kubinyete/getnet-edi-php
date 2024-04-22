<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;
use Kubinyete\Edi\Getnet\Registry\Contract\TransactionalSummaryInterface;

/**
 * REGISTRO TIPO 1 – DETALHE DO RV
 * Contém as informações do RV e com base no indicador do tipo de pagamento, identifica o tipo de movimento ao qual se refere:
 * - Movimento de Vendas – PF e RA;
 * - Movimento Financeiro – PG, AC e PR.
 */
final class TransactionalSummary extends Registry implements TransactionalSummaryInterface
{
    #[Number(1)]
    public int $registryType;
    #[Text(15)]
    public string $establishmentCode;
    #[Text(2)]
    public string $productCode;
    #[Text(3)]
    public string $captureMethod;
    #[Text(9)]
    public string $salesSummaryNumber;
    #[Date(8, '!dmY')]
    public DateTimeInterface $salesSummaryDate;
    #[Date(8, '!dmY')]
    public DateTimeInterface $salesSummaryPaymentDate;
    #[Text(3)]
    public string $bankCode;
    #[Text(6)]
    public string $bankAgency;
    #[Text(11)]
    public string $checkingAccount;
    #[Number(9)]
    public int $salesAcceptedQuantity;
    #[Number(9)]
    public int $salesRejectedQuantity;
    #[Numeric(12)]
    public string $grossAmount;
    #[Numeric(12)]
    public string $amount;
    #[Numeric(12)]
    public string $fareAmount;
    #[Numeric(12)]
    public string $discountRateAmount;
    #[Numeric(12)]
    public string $totalRejectedAmount;
    #[Numeric(12)]
    public string $totalCreditAmount;
    #[Numeric(12)]
    public string $chargesAmount;
    #[Text(2)]
    public string $paymentTypeIndicator;
    #[Number(2)]
    public int $salesSummaryInstallment;
    #[Number(2)]
    public int $salesSummaryInstallments;
    #[Text(15)]
    public string $establishmentCodeOrigin;
    #[Text(15)]
    public string $anticipationOperationNumber;
    #[Date(8, '!dmY')]
    public DateTimeInterface $dueDateOriginal;
    #[Numeric(12)]
    public string $operationCost;
    #[Numeric(12)]
    public string $salesSummaryAnticipationAmount;
    #[Text(18)]
    public string $chargeControlNumber;
    #[Numeric(12)]
    public string $chargeAmount;
    #[Text(15)]
    public string $compensationId;
    #[Number(3)]
    public int $currencyCode;
    #[Text(1)]
    public string $chargeWriteOffIdentifier;
    #[Text(1)]
    public string $transactionAdjustmentSignal;
    #[Text(2)]
    public string $accountTypeForPayment;
    #[Text(20)]
    public string $accountNumberForPayment;
    #[Text(25)]
    public string $receivableUnitId;
    #[Text(42)]
    public string $_padding;

    //

    function getRegistryType(): int
    {
        return $this->registryType;
    }

    function getEstablishmentCode(): string
    {
        return $this->establishmentCode;
    }

    function getProductCode(): string
    {
        return $this->productCode;
    }

    function getCaptureMethod(): string
    {
        return $this->captureMethod;
    }

    function getSalesSummaryNumber(): string
    {
        return $this->salesSummaryNumber;
    }

    function getSalesSummaryDate(): DateTimeInterface
    {
        return $this->salesSummaryDate;
    }

    function getSalesSummaryPaymentDate(): DateTimeInterface
    {
        return $this->salesSummaryPaymentDate;
    }

    function getBankCode(): string
    {
        return $this->bankCode;
    }

    function getBankAgency(): string
    {
        return $this->bankAgency;
    }

    function getCheckingAccount(): string
    {
        return $this->checkingAccount;
    }

    function getSalesAcceptedQuantity(): int
    {
        return $this->salesAcceptedQuantity;
    }

    function getSalesRejectedQuantity(): int
    {
        return $this->salesRejectedQuantity;
    }

    function getGrossAmount(): string
    {
        return $this->grossAmount;
    }

    function getAmount(): string
    {
        return $this->amount;
    }

    function getFareAmount(): string
    {
        return $this->fareAmount;
    }

    function getDiscountRateAmount(): string
    {
        return $this->discountRateAmount;
    }

    function getTotalRejectedAmount(): string
    {
        return $this->totalRejectedAmount;
    }

    function getTotalCreditAmount(): string
    {
        return $this->totalCreditAmount;
    }

    function getChargesAmount(): string
    {
        return $this->chargesAmount;
    }

    function getPaymentTypeIndicator(): string
    {
        return $this->paymentTypeIndicator;
    }

    function getSalesSummaryInstallment(): int
    {
        return $this->salesSummaryInstallment;
    }

    function getSalesSummaryInstallments(): int
    {
        return $this->salesSummaryInstallments;
    }

    function getEstablishmentCodeOrigin(): string
    {
        return $this->establishmentCodeOrigin;
    }

    function getAnticipationOperationNumber(): string
    {
        return $this->anticipationOperationNumber;
    }

    function getDueDateOriginal(): DateTimeInterface
    {
        return $this->dueDateOriginal;
    }

    function getOperationCost(): string
    {
        return $this->operationCost;
    }

    function getSalesSummaryAnticipationAmount(): string
    {
        return $this->salesSummaryAnticipationAmount;
    }

    function getChargeControlNumber(): string
    {
        return $this->chargeControlNumber;
    }

    function getChargeAmount(): string
    {
        return $this->chargeAmount;
    }

    function getCompensationId(): string
    {
        return $this->compensationId;
    }

    function getCurrencyCode(): int
    {
        return $this->currencyCode;
    }

    function getChargeWriteOffIdentifier(): string
    {
        return $this->chargeWriteOffIdentifier;
    }

    function getTransactionAdjustmentSignal(): string
    {
        return $this->transactionAdjustmentSignal;
    }

    function getAccountTypeForPayment(): string
    {
        return $this->accountTypeForPayment;
    }

    function getAccountNumberForPayment(): string
    {
        return $this->accountNumberForPayment;
    }

    function getReceivableUnitId(): string
    {
        return $this->receivableUnitId;
    }
}
