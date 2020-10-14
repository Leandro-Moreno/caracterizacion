<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{asset('img/logo-uniandes.png')}}" width="200px" alt="Logo Uniandes">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
