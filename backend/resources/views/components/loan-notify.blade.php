<div class="bg-orange-100 border-l-4 border-orange-500 text-orange-700 p-4 my-4" role="alert">
    <p class="mb-4">現在あなたは{{ $user->unpaidLoan()->pelicaAmount() }}ペリカを借りています。</p>
    <p class="">第{{ $user->unpaidLoan()->deadlineDate() }}日目までに返済してください。期限内に返済しないと、返済額を返すためにランダムに選手が没収されます。</p>
</div>
