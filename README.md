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
| ------ | ----------- | ----------- | ---------
| 0      | >=10.1      | Kubinyete\Edi\Getnet\Registry\Header | Kubinyete\Edi\Getnet\Registry\Contract\HeaderInterface
|        |             |                                      | ╠ getFileCreationDate(): DateTimeInterface
|        |             |                                      | ╠ getMovementReferenceDate(): DateTimeInterface
|        |             |                                      | ╠ getFileVersion(): string
|        |             |                                      | ╠ getEstablishmentCode(): string
|        |             |                                      | ╠ getAcquirerDocument(): string
|        |             |                                      | ╠ getAcquirerName(): string
|        |             |                                      | ╠ getSequenceNumber(): int
|        |             |                                      | ╠ getAcquirerCode(): string
|        |             |                                      | ╚ getLayoutVersion(): string
| 1      | >=10.1      | Kubinyete\Edi\Getnet\Registry\TransactionalSummary |
| 2      | >=10.1      | Kubinyete\Edi\Getnet\Registry\TransactionalAnalytic |
| 3      | >=10.1      | Kubinyete\Edi\Getnet\Registry\FinantialAdjustment | Kubinyete\Edi\Getnet\Registry\Contract\FinantialAdjustmentInterface
| 4      | -           | - |
| 5      | >=10.1      | Kubinyete\Edi\Getnet\Registry\FinantialSummary |
| 6      | >=10.1      | Kubinyete\Edi\Getnet\Registry\FinantialDetail |
| 9      | >=10.1      | Kubinyete\Edi\Getnet\Registry\Trailer | Kubinyete\Edi\Getnet\Registry\Contract\TrailerInterface
|        |             |                                       | ╚ getRegistryQuantity(): int
