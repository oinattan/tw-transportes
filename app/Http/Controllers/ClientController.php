<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClientRequest;
use App\Models\Client;

class ClientController extends Controller
{
    public function store(StoreClientRequest $request): Client
    {
        $client = Client::create($request->all());

        return $client;
    }
}
