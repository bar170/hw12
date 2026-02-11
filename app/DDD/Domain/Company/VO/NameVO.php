<?php
namespace App\DDD\Domain\Company\VO;

use App\DDD\Domain\Shared\VO\BaseVO;

class NameVO extends BaseVO
{
    public readonly string $value;
    public function __construct(string $value)
    {
        $value = trim($value);
        if ($value === '') {
            throw new \InvalidArgumentException('Название компании не может быть пустым');
        }
        $this->value = $value;
    }
}
