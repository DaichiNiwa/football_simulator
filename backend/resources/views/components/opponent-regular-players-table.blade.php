<p class="font-semibold mt-8 text-xl text-blue-1000 leading-tight">
    対戦相手：{{ $opponent->club_name }}
</p>
<h2>（オーナー：{{ $opponent->name }}）</h2>
<p>（レギュラー総合力：{{ $opponent->ClubStrength() }}）</p>

<table class="table-auto border-separate">
    <thead>
    <tr>
        <th class="px-4 py-2"></th>
        <th class="px-4 py-2">選手名</th>
        <th class="px-4 py-2">攻撃力</th>
        <th class="px-4 py-2">守備力</th>
        <th class="px-4 py-2">出身国</th>
        <th class="px-4 py-2">現在の市場価格</th>
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
        </tr>
    @endforeach

    </tbody>
</table>
