<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;
use Kubinyete\Edi\Getnet\Registry\Contract\FinantialAdjustmentInterface;

/**
 * REGISTRO TIPO 3 – AJUSTES
 * Contém as informações de ajustes a crédito ou a débito, chargebacks, cancelamentos e aluguel de POS.
 */
final class FinantialAdjustment extends Registry implements FinantialAdjustmentInterface
{
    #[Number(1)]
    public int $registryType;
    #[Text(15)]
    public string $establishmentCode;
    #[Text(9)]
    public string $salesSummaryNumber;
    #[Date(8, '!dmY')]
    public DateTimeInterface $salesSummaryDate;
    #[Date(8, '!dmY')]
    public DateTimeInterface $salesSummaryPaymentDate;
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
    public string $salesSummaryNumberOriginal;
    #[Text(12)]
    public string $acquirerNsu;
    #[Date(8, '!dmY')]
    public DateTimeInterface $transactionDateOriginal;
    #[Text(2)]
    public string $paymentTypeIndicator;
    #[Text(8)]
    public string $terminalCodeOriginal;
    #[Date(8, '!dmY')]
    public ?DateTimeInterface $paymentDateOriginal;
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

    //

    public function getRegistryType(): int
    {
        return $this->registryType;
    }

    public function getEstablishmentCode(): string
    {
        return $this->establishmentCode;
    }

    public function getSalesSummaryNumber(): string
    {
        return $this->salesSummaryNumber;
    }

    public function getSalesSummaryDate(): DateTimeInterface
    {
        return $this->salesSummaryDate;
    }

    public function getSalesSummaryPaymentDate(): DateTimeInterface
    {
        return $this->salesSummaryPaymentDate;
    }

    public function getAdjustmentId(): string
    {
        return $this->adjustmentId;
    }

    public function getWhiteSpace(): string
    {
        return $this->whiteSpace;
    }

    public function getAdjustmentSignal(): string
    {
        return $this->adjustmentSignal;
    }

    public function getAdjustmentAmount(): string
    {
        return $this->adjustmentAmount;
    }

    public function getAdjustmentReasonCode(): string
    {
        return $this->adjustmentReasonCode;
    }

    public function getLetterDate(): DateTimeInterface
    {
        return $this->letterDate;
    }

    public function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    public function getSalesSummaryNumberOriginal(): string
    {
        return $this->salesSummaryNumberOriginal;
    }

    public function getAcquirerNsu(): string
    {
        return $this->acquirerNsu;
    }

    public function getTransactionDateOriginal(): DateTimeInterface
    {
        return $this->transactionDateOriginal;
    }

    public function getPaymentTypeIndicator(): string
    {
        return $this->paymentTypeIndicator;
    }

    public function getTerminalCodeOriginal(): string
    {
        return $this->terminalCodeOriginal;
    }

    public function getPaymentDateOriginal(): DateTimeInterface
    {
        return $this->paymentDateOriginal;
    }

    public function getCurrencyCode(): int
    {
        return $this->currencyCode;
    }

    public function getSaleComissionAmount(): string
    {
        return $this->saleComissionAmount;
    }

    public function getMetadataContentType(): string
    {
        return $this->metadataContentType;
    }

    public function getMetadata(): string
    {
        return $this->metadata;
    }
}
