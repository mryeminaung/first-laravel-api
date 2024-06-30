<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h2 class="text-primary text-center mt-3">Login Form</h2>
                <div class="card p-4 my-3 shadow-sm">
                    <form autocomplete="off" method="POST" action="{{ url('/login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" required
                                value="{{ old('email') }}" id="email">
                            <x-error name="email" />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" required name="password" id="password" />
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
