<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h2 class="text-primary text-center mt-3">Register Form</h2>
                <div class="card p-4 my-3 shadow-sm">
                    <form autocomplete="off" method="POST" action="{{ url('/register') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" class="form-control"
                                id="name">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" value="{{ old('username') }}"
                                id="username">
                            @error('username')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="role" class="form-label">Choose Role</label>
                            <select class="form-select" id="role" name="role">
                                <option {{ old('role') === 'guest' ? 'selected' : '' }} value="guest">Guest</option>
                                <option {{ old('role') === 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}"
                                id="email">
                            @error('email')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" />
                            @error('password')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">
                            Register
                        </button>
                        <ul class="list-group">
                            @foreach ($errors->all() as $error)
                                <li class="list-group-item text-danger">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>
