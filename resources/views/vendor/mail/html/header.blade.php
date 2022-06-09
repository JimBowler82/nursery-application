<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;" ">
@if (trim($slot) === 'The Willows Way')
<img src="{{ asset('images/ww_logo.png') }}" class="logo" alt="willows way logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
