@props(['method' => 'POST', 'action' => '' ,'submit'=>'Submit'])

<form method="POST" action="{{ $action }}" {{ $attributes }}>
    @csrf

    <!-- Add method attribute if not GET or POST -->
    @if (!in_array($method, ['GET', 'POST']))
        @method($method)
    @endif

    <!-- Slot for form fields -->
    {{ $slot }}
    
    <!-- Submit Button -->
    @if($method !== 'DELETE')
    <div>
        <button type="submit">{{$submit}}</button>
    </div>
    @endif
    
</form>