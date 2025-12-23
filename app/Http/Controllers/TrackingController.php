<?php

namespace App\Http\Controllers;

use App\Models\Frete;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $codigo_rastreio = $request->input('codigo_rastreio', '');

        $frete = Frete::where('codigo_rastreio',$codigo_rastreio)
                        ->with('etapas') 
                        ->first();

        if (!$frete){
            return redirect()->back()->with('error','Código não encontrado!');
        }

        return view('frete.tracking', [
            'frete' => $frete
        ]);
    }
}
