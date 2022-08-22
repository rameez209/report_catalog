@props(['departmentCsv'])

@php
$department = explode(',', $departmentCsv);
@endphp

<ul class="flex">
    @foreach ($department as $dprtmnt)
        <li title="Requested By"
        class="flex items-center justify-center bg-sidenavcolor text-white rounded-xl py-1 px-3 mr-2 text-xs title-shadow">
            <a href="/?department={{ $dprtmnt }}">{{ $dprtmnt }} &nbsp; <i class="fas fa-folder-open "></i></a>
        </li>
    @endforeach
</ul>
