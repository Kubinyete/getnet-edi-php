<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Getnet\Registry\Contract\HeaderInterface;

/**
 * REGISTRO TIPO 0 – HEADER DE ARQUIVO
 * Apresenta informação referente ao conteúdo do arquivo – data do movimento das transações incluídas no arquivo e número
 * sequencial.
 */
final class Header extends Registry implements HeaderInterface
{
    /**
     * Tipo de Registro
     *
     * @var int
     */
    #[Number(1)]
    public int $registryType;

    /**
     * Data de criação do arquivo
     * Hora de criação do arquivo
     *
     * @var DateTimeInterface
     */
    #[Date(14, 'dmYHis')]
    public DateTimeInterface $fileCreationDate;

    /**
     * Hora de criação do arquivo
     *
     * @var DateTimeInterface
     */
    #[Date(8, '!dmY')]
    public DateTimeInterface $movementReferenceDate;

    /**
     * Arquivo e Versão
     *
     * @var string
     */
    #[Text(8)]
    public string $fileVersion;

    /**
     * Código do Estabelecimento (loja ou matriz)
     *
     * @var string
     */
    #[Text(15)]
    public string $establishmentCode;

    /**
     * CNPJ do adquirente
     *
     * @var string
     */
    #[Text(14)]
    public string $acquirerDocument;

    /**
     * Nome do adquirente
     *
     * @var string
     */
    #[Text(20)]
    public string $acquirerName;

    /**
     * Sequência
     *
     * @var int
     */
    #[Number(9)]
    public int $sequenceNumber;

    /**
     * Código do adquirente
     *
     * @var string
     */
    #[Text(2)]
    public string $acquirerCode;

    /**
     * Versão do Layout
     *
     * @var string
     */
    #[Text(25)]
    public string $layoutVersion;

    /**
     * Reservado para uso futuro
     *
     * @var string
     */
    #[Text(284)]
    public string $_padding;

    //

    public function getFileCreationDate(): DateTimeInterface
    {
        return $this->fileCreationDate;
    }

    public function getMovementReferenceDate(): DateTimeInterface
    {
        return $this->movementReferenceDate;
    }

    public function getFileVersion(): string
    {
        return $this->fileVersion;
    }

    public function getEstablishmentCode(): string
    {
        return $this->establishmentCode;
    }

    public function getAcquirerDocument(): string
    {
        return $this->acquirerDocument;
    }

    public function getAcquirerName(): string
    {
        return $this->acquirerName;
    }

    public function getSequenceNumber(): int
    {
        return $this->sequenceNumber;
    }

    public function getAcquirerCode(): string
    {
        return $this->acquirerCode;
    }

    public function getLayoutVersion(): string
    {
        return $this->layoutVersion;
    }
}
