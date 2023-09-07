@foreach(request()->session()->get('url') as $url)
    <div class="row justify-content-center">
        <div class="col-md-8">
            <input type="text" name="url" class="form-control form-control-lg font-size-lg is-valid bg-transparent"
                   value="{{ config('app.url') . '/' . $url->hash }}">
            <span class="text-break d-block" role="alert">{{ __('Url was shortened.') }}</span>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8 text-center">
            <a href="{{ route('home') }}" class="btn btn-primary">{{ __('Short new url') }}</a>
        </div>
    </div>
@endforeach
