<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}さんのマイページ
        </p>
    </x-slot>

    @if($user->hasUnpaidLoan())
        <x-loan-notify :user="$user"/>
    @endif
    <x-jet-validation-errors class="mb-4"/>

    @if(isset($user->club_name))
        <p class="font-semibold text-4xl text-gray-800 leading-tight">
            {{ $user->club_name }}
        </p>
    @else
        <x-club-name-form :user="$user"/>
    @endif

    <p class="font-semibold text-xl text-gray-800 leading-tight mt-4">クラブ画像</p>
    <x-club-image :user="$user"/>

    <x-club-image-form :user="$user"/>

    <x-regular-players-table/>

    <x-reserve-players-table/>

</x-app-layout>
