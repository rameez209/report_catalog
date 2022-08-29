<x-layout class="text-center ">

    <!-- Section: Design Block -->
    <section class="text-center"
        style="
            /* background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg'); */
            background: #FFFFFF;
            background: -webkit-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: -moz-linear-gradient(bottom, #FFFFFF, #363C3D);
            background: linear-gradient(to top, #FFFFFF, #363C3D);
            margin: 0, auto;
    ">
        <!-- Background image -->
        <div class="p-5 bg-image" style=" height: 300px; ">
        </div>

        <div class="card mx-4 mx-md-5 shadow-5-strong"
            style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
            <div class="card-body py-5 px-md-5 ">

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="text-2xl font-bold uppercase mb-1">
                            Login
                        </h2>
                        <p class="mb-4">Login to your account to add report</p>
                        <form method="POST" action="/users/authenticate">
                            @csrf

                            <!-- Email input -->
                            <div class="mb-4">
                                <div class="form-outline ">
                                    <input type="email" class="form-control" name="email"
                                        value="{{ old('email') }}" />
                                    <label for="email" class="form-label"><i class="fas fa-user"></i> Email</label>
                                </div>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Password input -->
                            <div class="mb-4">
                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4" class="form-control" name="password" />
                                    <label class="form-label" for="form3Example4"><i class="fas fa-lock"></i>
                                        Password</label>
                                    @error('password')
                                        <p class="text-red-500 text-xs">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Register -->
                            <div class="form-check d-flex justify-between mb-4">
                                <p>
                                    Don't have an account?
                                    <a href="/register" class="text-laravel">Register</a>
                                </p>
                                {{-- Forgot Password? --}}
                                {{-- <p>
                                    <a href="{{ url('/forgot_password') }}" class="text-laravel">Reset Password</a>
                                </p> --}}


                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="btn btn-laravel text-white bg-laravel btn-block mb-4">
                                Sign In
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="text-left">
            <small class="text-sidenavcolor">Copyright &copy; <?php echo date('Y'); ?> Engine Dome</small>
        </div> --}}
    </section>
    <!-- Section: Design Block -->


    {{-- <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center ">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Login
            </h2>
            <p class="mb-4">Login to your account to add report</p>
        </header>

        <form method="POST" action="/users/authenticate">
            @csrf
            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />

                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />

                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <button type="submit"
                    class="btn btn-block bg-laravel text-white rounded py-2 px-4 hover:bg-sidenavcolor">
                    Sign In
                </button>
            </div>

            <div class="mt-8">
                <p>
                    Don't have an account?
                    <a href="/register" class="text-laravel">Register</a>
                </p>
            </div>
        </form>
    </x-card> --}}
</x-layout>
