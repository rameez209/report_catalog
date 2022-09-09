@props(['keytermsCsv'])

@php
$keyterms = explode(',', $keytermsCsv);
@endphp

<ul class="flex">
    <div class="flex items-center justify-center rounded-xl">
        {{-- {!! '&nbsp;' !!} --}}
        @foreach ($keyterms as $keyterm)
            <li>
                {{-- DISPLAY N/A IF KEYTERM FIELD IS EMPTY --}}
                @if(!empty($keyterm))
                {{-- KEYTERMS REDIRECTED TO SEARCH --}}
                <a class="badge rounded-pill bg-light text-dark font-poppins hover:text-laravel text-capitalize"
                    href="/?search={{ $keyterm }}"><i class="fa fa-tag text-laravel"></i> {!! '&nbsp;' !!}{{ $keyterm }} </a>{!! '&nbsp;' !!} 
                @else
                   <p class="font-normal"> N/A </p>  
                @endif
            </li>
        @endforeach
    </div>
</ul>
