@extends('kjdion84.turtle.layouts.app')

@section('title', 'Register')
@section('content')
    <div class="container">
        <h1 class="display-5 mt-4 mb-4">@yield('title')</h1>

        <form method="POST" action="{{ route('register') }}" novalidate>
            {{ csrf_field() }}

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" class="form-control">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>

            <div class="form-group">
                <label for="timezone">Timezone</label>
                <select name="timezone" id="timezone" class="form-control">
                    @foreach (timezones() as $timezone)
                        <option value="{{ $timezone['identifier'] }}"{{ $timezone['identifier'] == config('app.timezone') ? ' selected' : '' }}>{{ $timezone['label'] }}</option>
                    @endforeach
                </select>
            </div>

            @if (config('turtle.recaptcha.site_key'))
                <div class="form-group">
                    <div class="g-recaptcha" data-sitekey="{{ config('turtle.recaptcha.site_key') }}"></div>
                    <script src="https://www.google.com/recaptcha/api.js"></script>
                </div>
            @endif

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>
@endsection