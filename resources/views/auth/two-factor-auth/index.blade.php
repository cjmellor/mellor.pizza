<h2>Two Factor Authentication</h2>
@if (session('status') == 'two-factor-authentication-enabled')
    <div>
        Two factor authentication has been enabled.
    </div>
@endif
Status: {{ auth()->user()->two_factor_enabled ? 'Yes' : 'No' }}
@if (session('status') == 'two-factor-authentication-enabled')
    <div>
        {!! auth()->user()->twoFactorQrCodeSvg() !!}
    </div>
@endif
@if(!auth()->user()->two_factor_enabled)
    <form action="/user/two-factor-authentication" method="post">
        @csrf
        <button type="submit">Enable 2FA</button>
    </form>
@else
    <form action="/user/two-factor-authentication" method="post">
        @method('delete')
        @csrf
        <button type="submit">Disable 2FA</button>
    </form>
@endif
@if (session('status') == 'two-factor-authentication-enabled')
    <h2>Recovery codes</h2>
    @foreach(auth()->user()->recoveryCodes() as $recoveryCode)
        <ul>
            <li>{{ $recoveryCode }}</li>
        </ul>
    @endforeach
@endif
