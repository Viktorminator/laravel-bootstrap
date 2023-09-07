<?php

namespace App\Repositories;

use App\Models\Url;
use Illuminate\Support\Carbon;

class UrlRepository
{
    protected Url $url;

    public function __construct(Url $url)
    {
        $this->url = $url;
    }

    public function save($data): Url
    {
        $url = new $this->url;

        $url->url = $data['url'];
        $url->limit = $data['limit'];
        $url->ends_at = Carbon::now()->addHours($data['ends_at']);
        $url->hash = '';

        $url->save();

        return $url->fresh();
    }
}
