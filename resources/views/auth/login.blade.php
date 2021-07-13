@extends('layouts.appauth')

@section('content')
<div class="account-container">
        <div class="content clearfix">
            <form method="POST" action="{{ route('login') }}">
            @csrf
                <div class="login-fields">
                    <div class="field">
                        <label for="username">Email</label>
                        <input type="text" id="username" name="email" value="" placeholder="Email" class="login username-field" />
                    </div> <!-- /field -->
                    <div class="field">
                        <label for="password">Пароль:</label>
                        <input type="password" id="password" name="password" value="" placeholder="Пароль" class="login password-field" />
                    </div> <!-- /password -->
                </div> <!-- /login-fields -->
                <div class="login-actions">
                    <span class="login-checkbox">
                        <input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
                    </span>
                    <button class="button btn btn-success btn-large">Войти</button>
                </div> <!-- .actions -->
            </form>
        </div> <!-- /content -->
    </div> <!-- /account-container -->
@endsection
