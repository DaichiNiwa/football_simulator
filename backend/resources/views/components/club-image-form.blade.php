<form method="POST" action="{{ route('club-image') }}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    <input type="file" class="form-control" name="file"  accept="image/png, image/jpeg, image/jpg">

    <x-jet-button class="ml-4">
        登録
    </x-jet-button>
</form>
