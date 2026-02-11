<?php
namespace App\DDD\Domain\Company\VO;

use App\DDD\Domain\Shared\VO\BaseVO;

class IdVO extends BaseVO
{
    public readonly string $value;
    public function __construct(string $value)
    {
        $id = (int) $value;
        if ($id <= 0) {
            throw new \InvalidArgumentException("Id компании - должно быть положительным числом: {$value}");
        }

        $this->value = $value;
    }
}
