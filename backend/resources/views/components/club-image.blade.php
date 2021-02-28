<p class="font-semibold text-xl text-gray-800 leading-tight my-4">クラブ画像</p>
<img src="{{ env('IMG_URL') . $user->club_image}}" style="height: 300px">
<form method="POST" action="{{ route('club-image') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <input type="file" class="form-control" name="file"  accept="image/png, image/jpeg, image/jpg">

    <x-jet-button class="ml-4">
        登録
    </x-jet-button>
</form>
