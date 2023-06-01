@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">

<img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo">

{{ $slot }}

</a>
</td>
</tr>
