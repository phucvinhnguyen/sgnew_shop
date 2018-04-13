<?php

namespace App\Http\Controllers;

use App\Repository\Lens\LensRepository;
use App\Repository\Refraction\RefractionErrorRepository;
use Illuminate\Http\Request;

class SettingController extends Controller
{
   private $refractionErrorRepo;
   private $lensRepo;

    public function __construct(RefractionErrorRepository $refractionErrorRepository, LensRepository $lensRepository)
    {
        $this->refractionErrorRepo = $refractionErrorRepository;
        $this->lensRepo = $lensRepository;
    }

    public function index(Request $request)
    {
        $refractionErrors = $this->refractionErrorRepo->getAll();
        $lens = $this->lensRepo->getAll();

        return view('pages.setting.index', [
            'refractionErrors' => $refractionErrors,
            'lens' => $lens
        ]);
    }
}
