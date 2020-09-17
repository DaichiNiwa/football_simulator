<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}さんのマイページ
        </p>
    </x-slot>

    @if(isset($user->club_name))
        <p class="font-semibold text-4xl text-gray-800 leading-tight">
            {{ $user->club_name }}
        </p>
    @else
        <x-club-name-form :user="$user"/>
    @endif

    <x-regular-players-table />

    <x-reserve-players-table />

</x-app-layout>
