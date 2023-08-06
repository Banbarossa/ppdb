@props(['messages'])

    @if($messages)
        <div class="invalid-feedback">
            @foreach((array) $messages as $message)
                <small>{{ $message }}</small>

            @endforeach
        </div>
    @endif
