<p class="font-semibold text-xl text-gray-800 leading-tight mb-4">ローンを借りる</p>
@if($user->hasUnpaidLoan())
    <div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 my-4" role="alert">
        <p>現在すでにローンを借りているため、新たに借りることができません。</p>
    </div>
@else
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
        <p>現在ローンを借りることができます。</p>
    </div>
@endif

<table class="table-auto border-separate">
    <x-jet-validation-errors class="mb-4"/>
    <thead>
    <tr>
        <th class="px-4 py-2"></th>
        <th class="px-4 py-2">ペリカ</th>
        <th class="px-4 py-2">返済期限</th>
        <th class="px-4 py-2"></th>
    </tr>
    </thead>
    <tbody class="table-striped">
    @foreach($loanOptions as $loanOption)
        <tr @if($loop->even) class="bg-blue-100" @endif>
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">{{ $loanOption->pelica_amount }}ペリカ</td>
            <td class="border px-4 py-2">{{ $loanOption->repay_deadline }}日以内</td>
            <td class="border px-4 py-2">
                @if($user->hasUnpaidLoan())
                    <p>借りることはできません</p>
                @else
                    <form method="POST" action="{{ route('loan-records.store') }}">
                        @csrf
                        <x-jet-input type="hidden" name="loan_option_id" value="{{ $loanOption->id }}"/>
                        <x-jet-button>
                            ローンを借りる
                        </x-jet-button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
