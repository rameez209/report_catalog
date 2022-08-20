@props(['keytermsCsv'])

@php
$keyterms = explode(',', $keytermsCsv);
@endphp

<ul class="flex">
    <div class="flex items-center justify-center rounded-xl mr-3 mt-2 ">Keyterms:
        {!! '&nbsp;' !!}
        @foreach ($keyterms as $keyterm)
            <li>
                {{-- DISPLAY N/A if KEYTERM FIELD IS EMPTY --}}
                @if(!empty($keyterm))
                {{-- Keyterms redirected to search --}}
                <a class="font-normal hover:text-laravel text-department underline"
                    href="/?search={{ $keyterm }}">{{ $keyterm .","}}</a>{!! '&nbsp;' !!}
                @else
                   <p class="font-normal"> N/A </p>  
                @endif
            </li>
        @endforeach
    </div>
</ul>
