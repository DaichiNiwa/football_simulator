<x-app-layout>
    <x-slot name="header">
        <p class="font-semibold text-xl text-gray-800 leading-tight">
            銀行
        </p>
    </x-slot>

    @if($user->hasUnpaidLoan())
        <x-loan-repay-form :user="$user"/>
    @endif

    <x-loan-option-table />

</x-app-layout>
