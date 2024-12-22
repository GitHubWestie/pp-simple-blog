<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Register</title>
    <meta name="description" content="Start your blog and share your stories. Register or login to connect, share and re-live the tales of bloggers far and wide.">
    <!-- Favicon generated using https://favicon.io/favicon-generator/ 🙏🏻 -->
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div id="slider" class="slider">
        <h1 class="blog-title">Start a <span class="title-span">Blog</span></h1>
        <h2 class="blog-sub-title"><span class="title-span">Share</span> a story<span class="title-span">...</span></h2>
    </div>
    <div class="container">

        {{-- Login form --}}
        <div class="placement">
            <div class="form-container">
                <h2 class="form-heading">Log<span class="underline-span">in</span></h2>
                <form class="form-class" action="/login" method="POST" autocomplete="off" role="form" aria-label="login form">
                    @csrf
                    <div class="form-elements">
                        <label class="form-label" for="login-email">Email:</label>
                        <input class="{{ $errors->has('login-email') ? 'input-error' : 'form-input' }}" value="{{ old('login-email') }}" id="login-email" name="login-email" type="text" placeholder="joeBloggs@example.com" minlength="3" maxlength="255" required aria-required="true" aria-labelledby="login-email">
                        @error('login-email')
                            <div class="validation-error" data-input="login-email">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-elements">
                        <label class="form-label" for="login-password">Password:</label>
                        <input class="{{ $errors->has('login-password') ? 'input-error' : 'form-input' }}" id="login-password" name="login-password" type="password" placeholder="Password" minlength="8" maxlength="32" required aria-required="true" aria-labelledby="login-password">
                        @error('login-password')
                            <div class="validation-error" data-input="login-password">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-elements">
                        <button class="form-button" type="submit">Confirm</button>
                        <p class="form-small-text">Not registered? <a id="register-link" href="#">Create an account</a>.</p>
                    </div>
                </form>
            </div>
        </div>

        {{-- Registration Form --}}
        <div class="placement">
            <div class="form-container">
                <h2 class="form-heading">Reg<span class="underline-span">ister</span></h2>
                <form class="form-class" action="/register" method="POST" autocomplete="off" role="form" aria-label="register form">
                    @csrf
                    <div class="form-elements">
                        <label class="form-label" for="register-email">Email:</label>
                        <input class="{{ $errors->has('register-email') ? 'input-error' : 'form-input' }}" value="{{ old('register-email') }}" id="register-email" name="register-email" type="email" placeholder="joeBloggs@example.com" minlength="3" maxlength="255" autocomplete="off" required autofocus aria-required="true" aria-labelledby="register-email">
                        @error('register-email')
                            <div class="validation-error" data-input="register-email">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-elements">
                        <label class="form-label" for="register-password">Password:</label>
                        <input class="{{ $errors->has('password') ? 'input-error' : 'form-input'}}" id="register-password" name="password" type="password" placeholder="Password" minlength="8" maxlength="128" aria-labelledby="register-password">
                        @error('password')
                            <div class="validation-error" data-input="password">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-elements">
                        <label class="form-label" for="confirm-password">Password:</label>
                        <input class="{{ $errors->has('confirm-password') ? 'input-error' : 'form-input' }}" id="confirm-password" name="confirm-password" type="password" placeholder="Confirm password" minlength="8" maxlength="128" required aria-required="true" aria-labelledby="confirm-password">
                        @error('confirm-password')
                            <div class="validation-error" data-input="confirm-password">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-elements">
                        <button class="form-button" type="submit">Confirm</button>
                        <p class="form-small-text">Already registered? <a id="login-link" href="#">Click here to login</a>.</p>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/login.js')}}" defer></script>
</body>
</html>
