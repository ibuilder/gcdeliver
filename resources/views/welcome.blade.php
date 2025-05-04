@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome') }}</div>

                    <div class="card-body">
                        @auth
                            {{-- If the user is authenticated, redirect to the dashboard --}}
                            <script>window.location = "/dashboard";</script>
                        @else
                            {{-- If the user is not authenticated, show login link --}}
                            <a href="{{ route('login') }}">Login</a>
                            <p>Please log in to continue</p>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection