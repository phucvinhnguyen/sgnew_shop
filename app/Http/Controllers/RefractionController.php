<?php

namespace App\Http\Controllers;

use App\Repository\Refraction\RefractionErrorRepository;
use Illuminate\Http\Request;

class RefractionController extends Controller
{
    private $refractionErrorRepo;

    public function __construct(RefractionErrorRepository $refractionErrorRepository)
    {
        $this->refractionErrorRepo = $refractionErrorRepository;
    }

    public function refractionAdd(Request $request)
    {
        $refractionTitle = $request->get('refraction-title');

        $this->refractionErrorRepo->create(['title' => $refractionTitle]);
        return redirect()->route('page.setting');
    }

    public function refractionEdit(Request $request)
    {
        $refractionId = $request->get('refraction-id');
        $refractionTitle = $request->get('refraction-title');
        $this->refractionErrorRepo->update($refractionId, ['title' => $refractionTitle]);

        return redirect()->route('page.setting');
    }

    public function refractionDel(Request $request)
    {
        $refractionId = $request->get('refraction-id');

        if (isset($refractionId)) {
            $this->refractionErrorRepo->delete($refractionId);
        }

        return redirect()->route('page.setting');
    }
}
