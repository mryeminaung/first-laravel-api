@props(['blogs'])

<x-admin-layout>

    <x-slot name="title">
        Dashboard
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="mx-auto col-md-10 col-lg-12">
                <h2 class="mt-3 text-center text-primary">Dashboard</h2>
                <div class="container mt-3">
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-12 col-lg-6 mb-4">
                                <x-blog-card :blog="$blog" />
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
