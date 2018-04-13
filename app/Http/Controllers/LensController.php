<?php

namespace App\Http\Controllers;

use App\Repository\Lens\LensRepository;
use Illuminate\Http\Request;

class LensController extends Controller
{
    private $lensRepo;

    public function __construct(LensRepository $lensRepository)
    {
        $this->lensRepo = $lensRepository;
    }

    public function lensAdd(Request $request)
    {
        $lensTitle = $request->get('lens-title');
        $this->lensRepo->create(['title' => $lensTitle]);

        return redirect()->route('page.setting');
    }

    public function lensEdit(Request $request)
    {
        $lensId = intval($request->get('lens-id'));
        $lensTitle = $request->get('lens-title');

        $this->lensRepo->update($lensId, ['title' => $lensTitle]);
        return redirect()->route('page.setting');
    }

    public function lensDel(Request $request)
    {
        $lensId = intval($request->get('lens-id'));

        if (isset($lensId)) {
            $this->lensRepo->delete($lensId);
        }

        return redirect()->route('page.setting');
    }

}
