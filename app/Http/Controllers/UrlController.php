<?php


namespace App\Http\Controllers;


use App\Models\Url;
use App\Services\UrlService;
use App\Http\Requests\StoreUrlRequest;

class UrlController extends Controller
{
    protected UrlService $urlService;

    public function __construct(UrlService $urlService)
    {
        $this->urlService = $urlService;
    }

    /**
     * Store a newly created resource in storage.
     * @param  \App\Http\Requests\StoreUrlRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUrlRequest $request): \Illuminate\Http\RedirectResponse
    {
        $data = $request->only([
            'url',
            'limit',
            'ends_at',
        ]);
        $this->urlService->saveUrlData($data);

        return redirect()->back()->with('url', Url::query()->orderBy('id', 'desc')->limit(1)->get());
    }
}
