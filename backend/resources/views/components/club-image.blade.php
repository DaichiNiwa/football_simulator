@isset($user->club_image)
<img src="{{ config('app.img_url') . $user->club_image}}" style="height: 250px" class="my-2">
@endisset
