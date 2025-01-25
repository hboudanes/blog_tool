@props(['method' => 'POST', 'action' => ''])

<form method="POST" action="{{ $action }}" {{ $attributes }}>
    @csrf

    <!-- Add method attribute if not GET or POST -->
    @if (!in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    <!-- Slot for form fields -->
    {{ $slot }}

    <!-- Submit Button -->
    <div>
        <button type="submit">Submit</button>
    </div>
</form>