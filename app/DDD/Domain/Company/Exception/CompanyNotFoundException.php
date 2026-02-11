<?php
namespace App\DDD\Domain\Company\Exception;

use App\DDD\Domain\Company\VO\IdVO;
use App\DDD\Domain\Shared\Exception\NotFoundException;

class CompanyNotFoundException extends NotFoundException
{
    public function __construct(IdVO $id)
    {
        parent::__construct("Компания с ID {$id->value()} не найдена");
    }
}
