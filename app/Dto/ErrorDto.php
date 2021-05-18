<?php

namespace App\Dto;

use JsonSerializable;

class ErrorDto implements JsonSerializable
{
    public function __construct(string $errorMessage, int $errorCode)
    {
        $this->code = $errorCode;
        $this->message = $errorMessage;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
