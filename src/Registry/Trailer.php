<?php

namespace Kubinyete\Edi\Getnet\Registry;

use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Field\Number;
use Kubinyete\Edi\Getnet\Registry\Contract\TrailerInterface;

/**
 * REGISTRO TIPO 9 – TRAILER DE ARQUIVO
 * Demonstra o fim do arquivo. Totaliza a quantidade de registros do arquivo.
 */
final class Trailer extends Registry implements TrailerInterface
{
    /**
     * Tipo de Registro
     *
     * @var int
     */
    #[Number(1)]
    public int $registryType;

    /**
     * Quantidade de registros
     *
     * @var integer
     */
    #[Number(9)]
    public int $registryQuantity;

    /**
     * Reservado para uso futuro
     *
     * @var string
     */
    #[Text(390)]
    public string $_padding;

    //

    public function getRegistryQuantity(): int
    {
        return $this->registryQuantity;
    }
}
