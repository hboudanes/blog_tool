

<div class="form-group">
    <label for="{{ $name }}">{{ $label }}</label>

    @if ($type === App\Enums\InputType::DEFAULT)
 
        <input type="text" name="{{ $name }}" id="{{ $name }}" class="form-control"
            value="{{ old($name, $value) }}"  {{ $required ? 'required' : '' }} >
    {{-- @elseif ($type === App\Enums\InputType::TEXTAREA)
        <textarea name="{{ $name }}" id="{{ $name }}" class="form-control" placeholder="{{ $placeholder }}"
            {{ $required ? 'required' : '' }}>{{ old($name, $value) }}</textarea>
    @elseif ($type === App\Enums\InputType::SELECT)
        <select name="{{ $name }}" id="{{ $name }}" class="form-control">
        
                <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>{{ $option }}
                </option>
            
        </select> --}}
    @endif

    @error($name)
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
