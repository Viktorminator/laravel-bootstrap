<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Support\Carbon;

class RedirectController extends Controller
{
    /**
     * Handle the Redirect.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|void
     */
    public function index($id)
    {
        $link = Url::where('hash', '=', $id)->first();
        if ($link) {
            if (Carbon::now()->greaterThan($link->ends_at)) {
                abort(404);
            }

            if ($link->limit != 0 && $link->clicks >= $link->limit) {
                abort(404);
            }
            Url::where('id', $link->id)->increment('clicks', 1);

            return redirect()->to($link->url, 301)->header('Cache-Control',
                'no-store, no-cache, must-revalidate');
        }

        abort(404);
    }
}
