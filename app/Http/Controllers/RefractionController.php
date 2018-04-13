<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RefractionController extends Controller
{
    public function refractionAdd(Request $request)
    {
        $refractionTitle = $request->get('title');
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
        $this->refractionErrorRepo->delete($refractionId);
        return redirect()->route('page.setting');
    }
}
