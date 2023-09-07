<?php

namespace App\Services;

use App\Models\Url;
use App\Repositories\UrlRepository;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class UrlService
{

    protected UrlRepository $urlRepository;

    public function __construct(UrlRepository $urlRepository)
    {
        $this->urlRepository = $urlRepository;
    }

    public function saveUrlData($data): Url
    {
        $validator = Validator::make($data, [
            'url'     => 'required',
            'limit'   => 'required',
            'ends_at' => 'required',
        ]);

        if ($validator->fails()) {
            throw new InvalidArgumentException($validator->errors()->first());
        }

        return $this->urlRepository->save($data);
    }
}
