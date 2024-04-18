<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;

/**
 * REGISTRO TIPO 1 – DETALHE DO RV
 * Contém as informações do RV e com base no indicador do tipo de pagamento, identifica o tipo de movimento ao qual se refere:
 * - Movimento de Vendas – PF e RA;
 * - Movimento Financeiro – PG, AC e PR.
 */
final class TransactionalSummary extends Registry
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
}
