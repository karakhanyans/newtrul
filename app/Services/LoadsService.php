<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;

class LoadsService
{
    public function __construct(protected PendingRequest $client)
    {

    }

    public function setHeaders($data): static
    {
        $this->client->withHeaders($data);

        return $this;
    }

    public function loads()
    {
        return $this->client
            ->get(config('services.loads.endpoint'))
            ->json();
    }
}
