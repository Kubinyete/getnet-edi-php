<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Field;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;

/**
 * REGISTRO TIPO 2 – DETALHE DO CV
 * Contém as informações dos CVs, podendo ser usado para:
 * - Complemento do registro tipo 1 – quando demonstra o detalhamento das transações que compõe o RV.
 * @small: Para todo registro tipo 2, existe um registro tipo 1.
 * @see: TransactionalSummary
 */
final class TransactionalAnalytic extends Registry
{
    #[Number(1)]
    public int $registryType;
    #[Text(15)]
    public string $establishmentCode;
    #[Text(9)]
    public string $salesSummaryNumber;
    #[Text(12)]
    public string $acquirerNsu;
    #[Date(14, 'dmYHis')]
    public DateTimeInterface $transactionDate;
    #[Text(19)]
    public string $cardNumber;
    #[Numeric(12)]
    public string $transactionAmount;
    #[Numeric(12)]
    public string $withdrawalAmount;
    #[Numeric(12)]
    public string $boardingTaxAmount;
    #[Number(2)]
    public int $installments;
    #[Number(2)]
    public int $installment;
    #[Numeric(12)]
    public string $installmentAmount;
    #[Date(8, '!dmY')]
    public DateTimeInterface $paymentDate;
    #[Text(10)]
    public string $authorizationCode;
    #[Text(3)]
    public string $captureMethod;
    #[Text(1)]
    public string $transactionStatus;
    #[Text(15)]
    public string $establishmentCodeOrigin;
    #[Text(8)]
    public string $terminalCode;
    #[Number(3)]
    public int $currencyCode;
    #[Text(1)]
    public string $cardIssuerOrigin;
    #[Text(1)]
    public string $transactionAdjustmentSignal;
    #[Text(3)]
    public string $digitalWallet;
    #[Numeric(12)]
    public string $saleComissionAmount;
    #[Text(2)]
    public string $metadataContentType;
    #[Field(118)]
    public string $metadata;
    #[Text(2)]
    public string $metadata2ContentType;
    #[Field(50)]
    public string $metadata2;
    #[Text(41)]
    public string $_padding;
}
