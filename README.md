# <img align="middle" src="https://site.getnet.com.br/wp-content/uploads/2021/08/logo-getnet.png" width="128"> **EDI** for PHP

**pt-BR**: Uma biblioteca simples e direta para carregar arquivos EDI da adquirente [Getnet](https://getnet.com.br/)

**en-US**: A straightfoward library for loading EDI files from [Getnet](https://getnet.com.br/)

***NOTA**: Este guia está primariamente em inglês, caso haja necessidade, será adicionado uma versão em pt-BR no futuro.*

---

### Warning

This package is still work-in-progress, there are plans for adding better support for document reading by providing
indexing and class bindings to directly access those entries, for now we have only provided the basic parser & document wrapper, 
providing the necessary means for line-by-line sequential reading.

### Installation

Let's start by requiring the package by running the following command
```sh
composer require kubinyete/getnet-edi
```

### Usage 

#### Basic line-by-line parsing

Provides a basic document class for opening a EDI text-file

```php
// Opening a new document (version 10.1)
$document = Kubinyete\Edi\Getnet\Document\Document::open('./sample/getnetextr_20240418_0000000_c101.txt');

// Sequential reading
while ($row = $document->next()) {
    // Current line number that has been read
    $lineNumber = $document->currentLineNumber();
    // Current line contents that has been read
    $lineContent = $document->currentLine();

    // What type/class we got after parsing it.
    $parsedType = get_class($row);

    echo "Current line {$lineNumber}: '{$lineContent}'" . PHP_EOL;
    echo "Parsed content ($parsedType): " . json_encode($row, JSON_PRETTY_PRINT) . PHP_EOL;
    // @NOTE: This is only a sample code for visualizing each entry that has been parsed
}

```

The above code will output:

```sh
Current line 1: '01804202407321018042024CEADM1000000000        00000000000000GETNET S.A.         000000001GSSANT. V.10.1 400 BYTES                                                                                                                                                                                                                                                                                               '
Parsed content (Kubinyete\Edi\Getnet\Registry\Header): {
    "registryType": 0,
    "fileCreationDate": {
        "date": "2024-04-18 07:32:10.000000",
        "timezone_type": 3,
        "timezone": "America\/Sao_Paulo"
    },
    "movementReferenceDate": {
        "date": "2024-04-18 00:00:00.000000",
        "timezone_type": 3,
        "timezone": "America\/Sao_Paulo"
    },
    "fileVersion": "CEADM100",
    "establishmentCode": "0000000",
    "acquirerDocument": "00000000000000",
    "acquirerName": "GETNET S.A.",
    "sequenceNumber": 1,
    "acquirerCode": "GS",
    "layoutVersion": "SANT. V.10.1 400 BYTES",
    "_padding": ""
}
```

### Type reference

Quick type reference for each registry type and associated baseline version.

We advice only to expect the associated registry interface, and not its defined type, this will prevent any breaking
change from affecting your application immediately (Ex: Name changes, value type changes, and so on)

If there are any changes that are not retrocompatible, a new type or associated interface will be used for that functionality.

| Type   | Version     | Registry type       | Interface
| ------ | ----------- | ------------------- | ---------
| 0      | >=10.1      | Kubinyete\Edi\Getnet\Registry\Header                | `Kubinyete\Edi\Getnet\Registry\Contract\HeaderInterface`
| 1      | >=10.1      | Kubinyete\Edi\Getnet\Registry\TransactionalSummary  | `Kubinyete\Edi\Getnet\Registry\Contract\TransactionalSummaryInterface`
| 2      | >=10.1      | Kubinyete\Edi\Getnet\Registry\TransactionalAnalytic | `Kubinyete\Edi\Getnet\Registry\Contract\TransactionalAnalyticInterface`
| 3      | >=10.1      | Kubinyete\Edi\Getnet\Registry\FinantialAdjustment   | `Kubinyete\Edi\Getnet\Registry\Contract\FinantialAdjustmentInterface`
| 4      | -           | - |
| 5      | >=10.1      | Kubinyete\Edi\Getnet\Registry\FinantialSummary      |
| 6      | >=10.1      | Kubinyete\Edi\Getnet\Registry\FinantialDetail       |
| 9      | >=10.1      | Kubinyete\Edi\Getnet\Registry\Trailer               | `Kubinyete\Edi\Getnet\Registry\Contract\TrailerInterface`

### Registry types

| Functionality interface                                | Signature
| ------------------------------------------------------ | ------
| HeaderInterface | `getFileCreationDate(): DateTimeInterface`
| HeaderInterface | `getMovementReferenceDate(): DateTimeInterface`
| HeaderInterface | `getFileVersion(): string`
| HeaderInterface | `getEstablishmentCode(): string`
| HeaderInterface | `getAcquirerDocument(): string`
| HeaderInterface | `getAcquirerName(): string`
| HeaderInterface | `getSequenceNumber(): int`
| HeaderInterface | `getAcquirerCode(): string`
| HeaderInterface | `getLayoutVersion(): string`

---

| Functionality interface                                 | Signature                                        
| ------------------------------------------------------  | --------------------------------------------- 
| TrailerInterface | `getRegistryQuantity(): int`                    

---

| Functionality interface                                 | Signature                                        
| ------------------------------------------------------  | --------------------------------------------- 
| FinantialAdjustmentInterface | `getRegistryType(): int`
| FinantialAdjustmentInterface | `getEstablishmentCode(): string`
| FinantialAdjustmentInterface | `getSalesSummaryNumber(): string`
| FinantialAdjustmentInterface | `getSalesSummaryDate(): DateTimeInterface`
| FinantialAdjustmentInterface | `getSalesSummaryPaymentDate(): DateTimeInterface`
| FinantialAdjustmentInterface | `getAdjustmentId(): string`
| FinantialAdjustmentInterface | `getWhiteSpace(): string`
| FinantialAdjustmentInterface | `getAdjustmentSignal(): string`
| FinantialAdjustmentInterface | `getAdjustmentAmount(): string`
| FinantialAdjustmentInterface | `getAdjustmentReasonCode(): string`
| FinantialAdjustmentInterface | `getLetterDate(): DateTimeInterface`
| FinantialAdjustmentInterface | `getCardNumber(): string`
| FinantialAdjustmentInterface | `getSalesSummaryNumberOriginal(): string`
| FinantialAdjustmentInterface | `getAcquirerNsu(): string`
| FinantialAdjustmentInterface | `getTransactionDateOriginal(): DateTimeInterface`
| FinantialAdjustmentInterface | `getPaymentTypeIndicator(): string`
| FinantialAdjustmentInterface | `getTerminalCodeOriginal(): string`
| FinantialAdjustmentInterface | `getPaymentDateOriginal(): DateTimeInterface`
| FinantialAdjustmentInterface | `getCurrencyCode(): int`
| FinantialAdjustmentInterface | `getSaleComissionAmount(): string`
| FinantialAdjustmentInterface | `getMetadataContentType(): string`
| FinantialAdjustmentInterface | `getMetadata(): string`

---

| Functionality interface                                 | Signature                                        
| ------------------------------------------------------  | --------------------------------------------- 
| TransactionalSummaryInterface | `getRegistryType(): int`
| TransactionalSummaryInterface | `getEstablishmentCode(): string`
| TransactionalSummaryInterface | `getProductCode(): string`
| TransactionalSummaryInterface | `getCaptureSignature(): string`
| TransactionalSummaryInterface | `getSalesSummaryNumber(): string`
| TransactionalSummaryInterface | `getSalesSummaryDate(): DateTimeInterface`
| TransactionalSummaryInterface | `getSalesSummaryPaymentDate(): DateTimeInterface`
| TransactionalSummaryInterface | `getBankCode(): string`
| TransactionalSummaryInterface | `getBankAgency(): string`
| TransactionalSummaryInterface | `getCheckingAccount(): string`
| TransactionalSummaryInterface | `getSalesAcceptedQuantity(): int`
| TransactionalSummaryInterface | `getSalesRejectedQuantity(): int`
| TransactionalSummaryInterface | `getGrossAmount(): string`
| TransactionalSummaryInterface | `getAmount(): string`
| TransactionalSummaryInterface | `getFareAmount(): string`
| TransactionalSummaryInterface | `getDiscountRateAmount(): string`
| TransactionalSummaryInterface | `getTotalRejectedAmount(): string`
| TransactionalSummaryInterface | `getTotalCreditAmount(): string`
| TransactionalSummaryInterface | `getChargesAmount(): string`
| TransactionalSummaryInterface | `getPaymentTypeIndicator(): string`
| TransactionalSummaryInterface | `getSalesSummaryInstallment(): int`
| TransactionalSummaryInterface | `getSalesSummaryInstallments(): int`
| TransactionalSummaryInterface | `getEstablishmentCodeOrigin(): string`
| TransactionalSummaryInterface | `getAnticipationOperationNumber(): string`
| TransactionalSummaryInterface | `getDueDateOriginal(): DateTimeInterface`
| TransactionalSummaryInterface | `getOperationCost(): string`
| TransactionalSummaryInterface | `getSalesSummaryAnticipationAmount(): string`
| TransactionalSummaryInterface | `getChargeControlNumber(): string`
| TransactionalSummaryInterface | `getChargeAmount(): string`
| TransactionalSummaryInterface | `getCompensationId(): string`
| TransactionalSummaryInterface | `getCurrencyCode(): int`
| TransactionalSummaryInterface | `getChargeWriteOffIdentifier(): string`
| TransactionalSummaryInterface | `getTransactionAdjustmentSignal(): string`
| TransactionalSummaryInterface | `getAccountTypeForPayment(): string`
| TransactionalSummaryInterface | `getAccountNumberForPayment(): string`
| TransactionalSummaryInterface | `getReceivableUnitId(): string`

---

| Functionality interface                                 | Signature                                        
| ------------------------------------------------------  | --------------------------------------------- 
| TransactionalAnalyticInterface | `getRegistryType(): int`
| TransactionalAnalyticInterface | `getEstablishmentCode(): string`
| TransactionalAnalyticInterface | `getSalesSummaryNumber(): string`
| TransactionalAnalyticInterface | `getAcquirerNsu(): string`
| TransactionalAnalyticInterface | `getTransactionDate(): DateTimeInterface`
| TransactionalAnalyticInterface | `getCardNumber(): string`
| TransactionalAnalyticInterface | `getTransactionAmount(): string`
| TransactionalAnalyticInterface | `getWithdrawalAmount(): string`
| TransactionalAnalyticInterface | `getBoardingTaxAmount(): string`
| TransactionalAnalyticInterface | `getInstallments(): int`
| TransactionalAnalyticInterface | `getInstallment(): int`
| TransactionalAnalyticInterface | `getInstallmentAmount(): string`
| TransactionalAnalyticInterface | `getPaymentDate(): DateTimeInterface`
| TransactionalAnalyticInterface | `getAuthorizationCode(): string`
| TransactionalAnalyticInterface | `getCaptureMethod(): string`
| TransactionalAnalyticInterface | `getTransactionStatus(): string`
| TransactionalAnalyticInterface | `getEstablishmentCodeOrigin(): string`
| TransactionalAnalyticInterface | `getTerminalCode(): string`
| TransactionalAnalyticInterface | `getCurrencyCode(): int`
| TransactionalAnalyticInterface | `getCardIssuerOrigin(): string`
| TransactionalAnalyticInterface | `getTransactionAdjustmentSignal(): string`
| TransactionalAnalyticInterface | `getDigitalWallet(): string`
| TransactionalAnalyticInterface | `getSaleComissionAmount(): string`
| TransactionalAnalyticInterface | `getMetadataContentType(): string`
| TransactionalAnalyticInterface | `getMetadata(): string`
| TransactionalAnalyticInterface | `getMetadata2ContentType(): string`
| TransactionalAnalyticInterface | `getMetadata2(): string`