<p class="font-semibold mt-8 text-xl text-gray-1000 leading-tight">
    控えメンバー
</p>
<table class="table-auto border-separate">
    <thead>
    <tr>
        <th class="px-4 py-2"></th>
        <th class="px-4 py-2">選手名</th>
        <th class="px-4 py-2">攻撃力</th>
        <th class="px-4 py-2">守備力</th>
        <th class="px-4 py-2">出身国</th>
        <th class="px-4 py-2">現在の市場価格</th>
        <th class="px-4 py-2"></th>
        <th class="px-4 py-2"></th>
    </tr>
    </thead>
    <tbody class="table-striped">
    @foreach($affiliations as $affiliation)
        <tr @if($loop->even) class="bg-blue-100" @endif>
            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
            <td class="border px-4 py-2">
                {{ $affiliation->player->name }}
                @if($affiliation->player->is_goalkeeper)<span class="bg-red-500 text-white rounded p-1">GK</span>@endif
            </td>
            <td class="border px-4 py-2">{{ $affiliation->currentAttackLevel() }}</td>
            <td class="border px-4 py-2">{{ $affiliation->currentDefenseLevel() }}</td>
            <td class="border px-4 py-2">{{ $affiliation->player->country() }}</td>
            <td class="border px-4 py-2">{{ $affiliation->currentPrice() }} ペリカ</td>
            <td class="border px-4 py-2">
                <form method="POST" action="{{ route('changeIsRegular', $affiliation) }}">
                    @csrf
                    @method ('PATCH')
                    <x-jet-button>
                        レギュラーにする
                    </x-jet-button>
                </form>
            </td>
            <td class="border px-4 py-2">
                <form method="POST" action="{{ route('affiliations.update', $affiliation) }}">
                    @csrf
                    @method ('PATCH')
                    <x-jet-button>
                        売却する
                    </x-jet-button>
                </form>
            </td>
        </tr>
    @endforeach

    </tbody>
</table>
