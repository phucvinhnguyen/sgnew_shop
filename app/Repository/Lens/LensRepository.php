<?php
namespace App\Repository\Lens;


use App\Entity\Lens;
use App\Repository\Base\BaseRepository;

class LensRepository extends BaseRepository
{
    public function getModel()
    {
        return Lens::class;
    }

}