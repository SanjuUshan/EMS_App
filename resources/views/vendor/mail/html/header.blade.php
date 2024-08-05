

@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                {{-- <img src="https://laravel.com/img/notification-logo.png" class="logo" alt="Laravel Logo"> --}}
                <img src="https://t4.ftcdn.net/jpg/04/33/22/61/360_F_433226171_uw6cPkVFx9pEJLs16yXFfTDfoHL5cfZM.jpg" class="logo" alt="Laravel Logo">
                {{-- <img src="{{ asset('assets/images/logo3.png') }}" class="card-img-top" alt="Laravel Logo" style="height: 10px"> --}}
                {{-- <img src="{{ public_path('assets/images/logo3.png') }}"
                width="10" height="10"> --}}
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
