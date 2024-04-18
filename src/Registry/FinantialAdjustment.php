<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;

/**
 * REGISTRO TIPO 3 – AJUSTES
 * Contém as informações de ajustes a crédito ou a débito, chargebacks, cancelamentos e aluguel de POS.
 */
final class FinantialAdjustment extends Registry
{
    #[Number(1)]
    public int $registryType;
    #[Text(15)]
    public string $establishmentCode;
    #[Text(9)]
    public string $saleSummaryNumber;
    #[Date(8, '!dmY')]
    public DateTimeInterface $saleSummaryDate;
    #[Date(8, '!dmY')]
    public DateTimeInterface $saleSummaryPaymentDate;
    #[Text(20)]
    public string $adjustmentId;
    #[Text(1)]
    public string $whiteSpace;
    #[Text(1)]
    public string $adjustmentSignal;
    #[Numeric(12)]
    public string $adjustmentAmount;
    #[Text(2)]
    public string $adjustmentReasonCode;
    #[Date(8, '!dmY')]
    public DateTimeInterface $letterDate;
    #[Text(19)]
    public string $cardNumber;
    #[Text(9)]
    public string $saleSummaryNumberOriginal;
    #[Text(12)]
    public string $acquirerNsu;
    #[Date(8, '!dmY')]
    public DateTimeInterface $transactionDateOriginal;
    #[Text(2)]
    public string $paymentTypeIndicator;
    #[Text(8)]
    public string $terminalCodeOriginal;
    #[Date(8, '!dmY')]
    public DateTimeInterface $paymentDateOriginal;
    #[Number(3)]
    public int $currencyCode;
    #[Numeric(12)]
    public string $saleComissionAmount;
    #[Text(2)]
    public string $metadataContentType;
    #[Text(118)]
    public string $metadata;
    #[Text(114)]
    public string $_padding;
}
