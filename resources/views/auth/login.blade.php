<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="needs-validation space-y-6" novalidate>
        @csrf
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-10 w-auto" src="{{asset('/images/apple-touch-icon.png')}}" alt="ShopNest">
          <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Login to your Account</h2>
        </div>
        <div class="mb-3">


            <x-input-label for="email" :value="__('Email')" class="block text-sm font-medium leading-6 text-gray-900"/>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-envelope"></i>
                </span>
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
        </div>

        <div class="mb-3">
            <x-input-label for="password" :value="__('Password')" class="block text-sm font-medium leading-6 text-gray-900"/>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="fas fa-lock"></i>
                </span>
                <x-text-input id="password" class="form-control"
                              type="password"
                              name="password"
                              required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
        </div>

        <div class="mb-3 form-check">
            <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
            <label class="form-check-label" for="remember_me">
                <span class="ms-1">{{ __('Remember me') }}</span>
            </label>

            <span>
              @if (Route::has('password.request'))
                <a class="font-semibold text-indigo-600 hover:text-indigo-500" href="{{ route('password.request') }}" style="float:right;">
                    <i class="fas fa-question-circle"></i> {{ __('Forgot your password?') }}
                </a>
            @endif
          </span>
        </div>

        <div class="d-flex justify-content-end align-items-center">

            <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                {{ __('Log in') }}
            </button>
        </div>

        <div class="mt-3 text-center">
            <p class="block text-sm font-medium leading-6 text-gray-900"> Not registered yet? </p> &nbsp; &nbsp;
            <br>

            <button type="button" name="button" class="flex w-full justify-center rounded-md bg-purple-600 px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-purple-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-purple-600" onclick="window.location.href = '{{ route('register') }}';">
                {{ __('Register here') }}
            </button>

        </div>
    </form>
</x-guest-layout>
