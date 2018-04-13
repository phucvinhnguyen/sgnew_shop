<?php
namespace App\Repository\Refraction;

use App\Entity\RefractionError;
use App\Repository\Base\BaseRepository;

class RefractionErrorRepository extends BaseRepository
{
    public function getModel()
    {
        return RefractionError::class;
    }

}