<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;

/**
 * REGISTRO TIPO 5 – DETALHE DA OPERAÇÃO DE GRAVAME OU CESSÃO
 * Utilizado para apresentar os detalhes de uma operação de gravame ou cessão
 */
final class FinantialSummary extends Registry
{
    #[Number(1)]
    public int $registryType;
    #[Text(15)]
    public string $establishmentCode;
    #[Date(8, '!dmY')]
    public DateTimeInterface $operationDate;
    #[Date(8, '!dmY')]
    public DateTimeInterface $operationCreditDate;
    #[Text(20)]
    public string $operationNumber;
    #[Text(2)]
    public string $operationType;
    #[Numeric(12)]
    public string $operationGrossAmountPlusSplit;
    #[Numeric(12)]
    public string $operationGrossAmount;
    #[Numeric(12)]
    public string $operationCostAmount;
    #[Numeric(12)]
    public string $operationAmount;
    #[Numeric(11)]
    public string $operationMonthlyTax;
    #[Text(2)]
    public string $accountType;
    #[Text(3)]
    public string $accountBank;
    #[Text(6)]
    public string $accountAgency;
    #[Text(20)]
    public string $accountCheckingNumber;
    #[Text(3)]
    public string $operationChannel;
    #[Text(1)]
    public string $movementType;
    #[Text(3)]
    public string $participantType;
    #[Text(18)]
    public string $participantId;
    #[Text(1)]
    public string $participantDocumentType;
    #[Text(14)]
    public string $participantDocumentNumber;
    #[Text(2)]
    public string $participantAccountType;
    #[Text(3)]
    public string $participantBank;
    #[Text(6)]
    public string $participantAgency;
    #[Text(20)]
    public string $participantAccountNumber;
    #[Text(15)]
    public string $establishmentCodeOrigin;
    #[Text(25)]
    public string $participantLegalName;
    #[Text(2)]
    public string $productCode;
    #[Text(118)]
    public string $_padding;
}
