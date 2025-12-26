<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;

class HistoricoController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $phone = preg_replace('/\D/','',$request->input('phone',''));

        $cliente = Client::where('phone',$phone)
                            ->with('enviados','recebidos')
                            ->first();

        if (!$cliente){
            return redirect()->back()->with('error', 'Cliente não encontrado.');
        }

        return view('frete.historico',[
            'cliente' => $cliente
        ]);
    }
}
