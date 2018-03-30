<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 29-Mar-18
 * Time: 3:48 PM
 */

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