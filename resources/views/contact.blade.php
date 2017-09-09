@extends('kjdion84.turtle.layouts.app')

@section('title', 'Contact')
@section('content')
    <div class="container">
        <h1 class="display-5 mt-4 mb-4">@yield('title')</h1>

        <form method="POST" action="{{ route('contact') }}" novalidate>
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control" value="{{ auth()->check() ? auth()->user()->name : '' }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ auth()->check() ? auth()->user()->email : '' }}">
            </div>

            <div class="form-group">
                <label for="enquiry">Enquiry</label>
                <textarea name="enquiry" id="enquiry" class="form-control" rows="5"></textarea>
            </div>

            @if (auth()->guest() && config('turtle.recaptcha.site_key'))
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="{{ config('turtle.recaptcha.site_key') }}"></div>
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Send</button>
        </form>
    </div>
@endsection