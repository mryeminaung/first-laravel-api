<x-layout>
    <x-slot name="title">
        Login
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-5">
                <h2 class="mt-3 text-center text-primary">Login Form</h2>
                <div class="p-4 my-3 shadow-sm card">
                    <form autocomplete="off" method="POST" action="{{ url('/login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email"
                                class="form-control @error('email')
                                is-invalid
                            @enderror"
                                required value="{{ old('email') }}" id="email">
                            <x-error name="email" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password"
                                class="form-control @error('password')
                                is-invalid
                            @enderror"
                                required name="password" id="password" />
                            <x-error name="password" />
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Login
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
