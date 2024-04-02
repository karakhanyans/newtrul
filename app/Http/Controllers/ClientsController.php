<?php

namespace App\Http\Controllers;

use App\Http\Resources\ClientResource;
use App\Services\LoadsService;

class ClientsController extends Controller
{
    public function index(LoadsService $loadsService)
    {
        $loads = $loadsService->loads();

        $clients = collect($loads['data'])
            ->pluck('client')
            ->unique('id')
            ->values();

        return ClientResource::collection($clients);
    }
}
