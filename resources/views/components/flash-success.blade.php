@if (session()->has('success'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 2000)" x-show="show"
        class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-success text-white px-48 py-4 mt-20">
        <p>
            {{ session('success') }}
        </p>
    </div>
@endif
