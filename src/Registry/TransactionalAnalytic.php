<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Field;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;
use Kubinyete\Edi\Registry\Field\Aggregate;
use Kubinyete\Edi\Getnet\Registry\Contract\TransactionalAnalyticInterface;
use Kubinyete\Edi\Getnet\Registry\Aggregate\TransactionalAnalyticMetadataAirlines;
use Kubinyete\Edi\Getnet\Registry\Aggregate\TransactionalAnalyticMetadataIdempKey;
use Kubinyete\Edi\Getnet\Registry\Contract\TransactionalAnalyticMetadataInterface;
use Kubinyete\Edi\Getnet\Registry\Aggregate\TransactionalAnalyticMetadataEcommerce;
use Kubinyete\Edi\Getnet\Registry\Aggregate\TransactionalAnalyticMetadataRecurring;
use Kubinyete\Edi\Getnet\Registry\Aggregate\TransactionalAnalyticMetadataRecurringTid;
use Kubinyete\Edi\Getnet\Registry\Aggregate\TransactionalAnalyticMetadataSoftdescriptor;

/**
 * REGISTRO TIPO 2 – DETALHE DO CV
 * Contém as informações dos CVs, podendo ser usado para:
 * - Complemento do registro tipo 1 – quando demonstra o detalhamento das transações que compõe o RV.
 * @small: Para todo registro tipo 2, existe um registro tipo 1.
 * @see: TransactionalSummary
 */
final class TransactionalAnalytic extends Registry implements TransactionalAnalyticInterface
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
    #[Aggregate(120, [
        TransactionalAnalyticMetadataRecurring::class,
        TransactionalAnalyticMetadataEcommerce::class,
        TransactionalAnalyticMetadataRecurringTid::class,
        TransactionalAnalyticMetadataSoftdescriptor::class,
        TransactionalAnalyticMetadataIdempKey::class,
        TransactionalAnalyticMetadataAirlines::class,
    ])]
    public ?TransactionalAnalyticMetadataInterface $metadata;
    #[Text(2)]
    public string $metadata2ContentType;
    #[Field(50)]
    public string $metadata2;
    #[Text(41)]
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

    function getSalesSummaryNumber(): string
    {
        return $this->salesSummaryNumber;
    }

    function getAcquirerNsu(): string
    {
        return $this->acquirerNsu;
    }

    function getTransactionDate(): DateTimeInterface
    {
        return $this->transactionDate;
    }

    function getCardNumber(): string
    {
        return $this->cardNumber;
    }

    function getTransactionAmount(): string
    {
        return $this->transactionAmount;
    }

    function getWithdrawalAmount(): string
    {
        return $this->withdrawalAmount;
    }

    function getBoardingTaxAmount(): string
    {
        return $this->boardingTaxAmount;
    }

    function getInstallments(): int
    {
        return $this->installments;
    }

    function getInstallment(): int
    {
        return $this->installment;
    }

    function getInstallmentAmount(): string
    {
        return $this->installmentAmount;
    }

    function getPaymentDate(): DateTimeInterface
    {
        return $this->paymentDate;
    }

    function getAuthorizationCode(): string
    {
        return $this->authorizationCode;
    }

    function getCaptureMethod(): string
    {
        return $this->captureMethod;
    }

    function getTransactionStatus(): string
    {
        return $this->transactionStatus;
    }

    function getEstablishmentCodeOrigin(): string
    {
        return $this->establishmentCodeOrigin;
    }

    function getTerminalCode(): string
    {
        return $this->terminalCode;
    }

    function getCurrencyCode(): int
    {
        return $this->currencyCode;
    }

    function getCardIssuerOrigin(): string
    {
        return $this->cardIssuerOrigin;
    }

    function getTransactionAdjustmentSignal(): string
    {
        return $this->transactionAdjustmentSignal;
    }

    function getDigitalWallet(): string
    {
        return $this->digitalWallet;
    }

    function getSaleComissionAmount(): string
    {
        return $this->saleComissionAmount;
    }

    function getMetadata(): ?TransactionalAnalyticMetadataInterface
    {
        return $this->metadata;
    }

    function getMetadata2ContentType(): string
    {
        return $this->metadata2ContentType;
    }

    function getMetadata2(): string
    {
        return $this->metadata2;
    }
}
