@extends('layouts.app')

@section('content')
    <div class="container">
        @if(request()->session()->get('url'))
            @include('home.url')
        @else
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <h2>Shorten your url</h2>
                    <form class="input-group mb-3" method="POST" action="{{ route('url.store') }}">
                        @csrf
                        <input type="text" class="form-control" name="url" placeholder="https://..." aria-label="Link" required>
                        <input type="text" class="form-control" name="limit" placeholder="{{ __('Limit') }}" aria-label="Limit" required>
                        <input type="number" name="ends_at" step="1" min="1" max="24" class="form-control"
                               placeholder="{{ __('Expiration hours') }}" aria-label="Lifetime (hours)"
                               required>
                        <button type="submit" class="btn btn-primary">{{ __('Shorten') }}</button>
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
