@props(['keytermsCsv'])

@php
$keyterms = explode(',', $keytermsCsv);
@endphp

<ul class="flex">
    <div class="flex items-center justify-center bg-white rounded-xl mt-4 py-1 px-1 mr-3 text-sm font-bold">Keyterms:
        {!! '&nbsp;' !!}
        @foreach ($keyterms as $keyterm)
            <li>
                {{-- If keyterm field is empty display N/A --}}
                @if(!empty($keyterm))
                {{-- Keyterms redirected to search --}}
                <a class="hover:text-laravel "
                    href="/?search={{ $keyterm }}">{{ $keyterm .","}}</a>{!! '&nbsp;' !!}
                @else
                    N/A   
                @endif
            </li>
        
        @endforeach
    </div>
</ul>
