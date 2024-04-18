<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Registry\Field\Numeric;

/**
 * REGISTRO TIPO 6 – DETALHE DAS UNIDADES DE RECEBÍVEIS ENVOLVIDAS NA OPERAÇÃO DE GRAVAME OU CESSÃO
 * Utilizado para apresentar os detalhes das unidades de recebíveis envolvidas na operação de gravame ou cessão
 */
final class FinantialDetail extends Registry
{
    #[Number(1)]
    public int $registryType;
    #[Text(15)]
    public string $establishmentCode;
    #[Date(8, '!dmY')]
    public DateTimeInterface $operationDate;
    #[Text(20)]
    public string $operationNumber;
    #[Text(2)]
    public string $operationType;
    #[Text(18)]
    public string $oldReceivableUnitId;
    #[Text(2)]
    public string $productCode;
    #[Date(8, '!dmY')]
    public DateTimeInterface $receivableUnitDueDate;
    #[Numeric(12)]
    public string $receivableUnitGrossAmount;
    #[Numeric(12)]
    public string $receivableUnitGrossAmountAcquiring;
    #[Numeric(12)]
    public string $receivableUnitCost;
    #[Numeric(12)]
    public string $amount;
    #[Text(2)]
    public string $domicileAccountType;
    #[Text(3)]
    public string $domicileBank;
    #[Text(6)]
    public string $domicileAgency;
    #[Text(20)]
    public string $domicileAccountNumber;
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
    #[Text(25)]
    public string $receivableUnitId;
    #[Text(64)]
    public string $_padding;
}
