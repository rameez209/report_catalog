@props(['departmentCsv'])

@php
$department = explode(',', $departmentCsv);
@endphp

<ul class="flex">
    @foreach ($department as $dprtmnt)
        <li title="Requested By"
        class="flex items-center justify-center bg-black text-white rounded-xl py-1 px-3 mr-2 text-xs font-bold hover:bg-department">
            <a href="/?department={{ $dprtmnt }}">{{ $dprtmnt }}</a>
        </li>
    @endforeach
</ul>
