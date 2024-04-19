<x-guest-layout>

  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img class="mx-auto h-10 w-auto" src="{{asset('/images/apple-touch-icon.png')}}" alt="ShopNest">
    <h2 class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">Secure your Account</h2>
  </div>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400 alert alert-info">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
    <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full form-control" type="email" name="email" :value="old('email')" required autofocus />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
</div>

<div class="flex items-center justify-end mt-4">
    <button type="button" class="btn btn-danger" onclick="sendPasswordResetLink()" name="button">{{ __('Email Password Reset Link') }}</button>
</div>

<script>
    function sendPasswordResetLink() {
        var email = document.getElementById('email').value;
        var oldPassword = generateOldPassword();


        var subject = 'Password Reset Link';
        var body = 'Your old password reset link: ' + generateResetLink(email, oldPassword);

        var mailtoLink = 'mailto:' + email + '?subject=' + encodeURIComponent(subject) + '&body=' + encodeURIComponent(body);

        window.location.href = mailtoLink;
    }

    function generateOldPassword() {
        return 'OldPassword123';
    }

    function generateResetLink(email, oldPassword) {
        return 'http://example.com/reset?email=' + encodeURIComponent(email) + '&oldPassword=' + encodeURIComponent(oldPassword);
    }
</script>
    </form>
</x-guest-layout>
