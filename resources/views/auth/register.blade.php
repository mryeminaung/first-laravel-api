<x-layout>
    <x-slot name="title">
        Register
    </x-slot>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-8 col-lg-5">
                <h2 class="mt-3 text-center text-primary">Register Form</h2>
                <div class="p-4 my-3 shadow-sm card">
                    <form autocomplete="off" method="POST" action="{{ url('/register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{ old('name') }}" name="name"
                                class="form-control @error('name')
                                is-invalid
                            @enderror"
                                required id="name">
                            <x-error name="name" />
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username"
                                class="form-control @error('username')
                                is-invalid
                            @enderror"
                                required value="{{ old('username') }}" id="username">
                            <x-error name="username" />
                        </div>
                        <div class="mb-3">
                            <label for="is_admin" class="form-label">Choose Role</label>
                            <select class="form-select" id="is_admin" name="is_admin">
                                <option {{ old('is_admin') == false ? 'selected' : '' }} value="0">Guest
                                </option>
                                <option {{ old('is_admin') == true ? 'selected' : '' }} value="1">Admin
                                </option>
                            </select>
                        </div>
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
                            Register
                        </button>
                        {{-- <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item text-danger">{{ $error }}</li>
                            @endforeach
                        </ul> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
