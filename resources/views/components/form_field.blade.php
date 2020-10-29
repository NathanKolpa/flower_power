<label>{{ $title }}{{ $required ?  '*' : '' }}</label>

<input name="{{ $name }}" type="{{ $type }}"
       class="form-control @if($errors->any()) {{$errors->has($name) ? 'is-invalid' : 'is-valid'}} @endif"
    {{ $required ? 'required' : '' }} value="{{ $value }}">

{{--<small class=" form-text text-muted">@lang("text.email_disclaimer")</small>--}}
@if($errors->any())
    @foreach($errors->get($name) as $error)
        <div class="invalid-feedback">
            {{ $error }}
        </div>
    @endforeach
@endif

