<?php

namespace Kubinyete\Edi\Getnet\Registry\Contract;

use DateTimeInterface;

interface HeaderInterface
{
    function getFileCreationDate(): DateTimeInterface;
    function getMovementReferenceDate(): DateTimeInterface;
    function getFileVersion(): string;
    function getEstablishmentCode(): string;
    function getAcquirerDocument(): string;
    function getAcquirerName(): string;
    function getSequenceNumber(): int;
    function getAcquirerCode(): string;
    function getLayoutVersion(): string;
}
