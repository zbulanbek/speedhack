@extends('layouts.app')

@section('content')
    <section class="login-page">
        <div class="login-form">
            <div class="header">
                <span class="title">Сброс пароля</span>
            </div>
            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="block">
                    <label for="email">Email</label>
                    <input id="email" class="block mt-1 w-full" type="email" name="email" value="{{old('email')}}" required autofocus/>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button>
                        {{ __('Email Password Reset Link') }}
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
