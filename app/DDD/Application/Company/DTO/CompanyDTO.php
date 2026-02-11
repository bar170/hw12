<?php
namespace App\DDD\Application\Company\DTO;


use App\DDD\Domain\Company\VO\DescriptionVO;
use App\DDD\Domain\Company\VO\IdVO;
use App\DDD\Domain\Company\VO\NameVO;

readonly class CompanyDTO
{
    public function __construct(
        public IdVO $companyId,
        public NameVO $name,
        public DescriptionVO $description
    )
    {
    }
}
