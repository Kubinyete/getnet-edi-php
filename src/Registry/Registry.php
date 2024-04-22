<?php

namespace Kubinyete\Edi\Getnet\Registry;

use JsonSerializable;
use Kubinyete\Edi\Registry\Field\Text;
use Kubinyete\Edi\Registry\Registry as BaseRegistry;

abstract class Registry extends BaseRegistry implements JsonSerializable
{
    public function jsonSerialize(): mixed
    {
        return get_object_vars($this);
    }
}
