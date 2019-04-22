@extends('layouts.app')

@section('content')



    <div class="flex justify-center items-center" style="height: 500px;">

        <div class="sm:w-full" style="width: 430px;">

            <div class="card">
                {{--header--}}
                <h3 class="font-normal text-xl py-4 mb-3 -ml-5 pl-4 border-l-4 border-blue-light">{{ __('Login') }}</h3>
                {{--login info--}}
                <div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="flex flex-col items-center">

                            {{--Email--}}
                            <div class="flex w-full items-center mb-4">
                                <label for="email" class="mr-8">{{ __('E-Mail Address') }}</label>
                                <div>
                                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                                           class="rounded border p-2 {{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           style="border-color: #CED4DA;"
                                           >

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--Password--}}
                            <div class="flex w-full justify-center items-center mb-4">
                                <label for="password" class="mr-8">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="rounded border p-2 {{ $errors->has('password') ? ' is-invalid' : '' }}"
                                           style="border-color: #CED4DA;"
                                           name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            {{--Remember Me--}}
                            <div class="mb-4">
                                <div class="pl-3">
                                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>

                            {{--Login--}}
                            <div class="flex w-full justify-end items-center">
                                <button class="button mr-3" type="submit">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="no-underline" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                                
                            </div>

                        </div>



                    </form>
                </div>

            </div>

        </div>

    </div>



@endsection
