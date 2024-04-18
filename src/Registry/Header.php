<?php

namespace Kubinyete\Edi\Getnet\Registry;

use DateTimeInterface;
use Kubinyete\Edi\Registry\Field\Date;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;

/**
 * REGISTRO TIPO 0 – HEADER DE ARQUIVO
 * Apresenta informação referente ao conteúdo do arquivo – data do movimento das transações incluídas no arquivo e número
 * sequencial.
 */
final class Header extends Registry
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
     * @var string
     */
    #[Date(14, 'dmYHis')]
    public DateTimeInterface $fileCreationDate;

    /**
     * Hora de criação do arquivo
     *
     * @var string
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
}
