@props(['inputType' => 'default','for'=>'','labelName'=>''])

<div class="form-group">
   
    @switch($inputType)
        @case($inputType === 'select')
      
        <div>
            @if ($labelName !== '')
            <label for="{{ $for }}">{{$labelName}}</label>
            @endif
           
            <select {{ $attributes }} >
                {{$slot}}
              
            </select>
        </div>
        @break

        @case($inputType === 'textarea')
        
        @if ($labelName !== '')
        <label for="{{ $for }}">{{$labelName}}</label>
        @endif
            <textarea class="form-control" {{ $attributes }}>  {{$slot}}</textarea>
        @break
     
            
        @break
        @default
        @if ($labelName !== '')
        <label for="{{ $for }}">{{$labelName}}</label>
        @endif
            <input class="form-control" {{ $attributes }}  value="{{$slot}}"/> 
    @endswitch




    @error($attributes['name'])
        <span class="text-danger">{{ $message }}</span>
    @enderror
</div>
{{-- @elseif ($type === App\Enums\InputType::TEXTAREA)
      
 @elseif ($type === App\Enums\InputType::SELECT)
        <select name="{{ $name }}" id="{{ $name }}" class="form-control">

            <option value="{{ $key }}" {{ $key == $value ? 'selected' : '' }}>{{ $option }}
            </option>

        </select>   --}}
