<!-- Form -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Two Factor Authentication (2FA)</h6>
    </div>
    <div class="card-body">

        @if (session('status') == 'two-factor-authentication-enabled')
            <div class="mb-4 font-medium text-sm">
                Please finish configuring two factor authentication below.
            </div>
        @endif

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                A new email verification link has been emailed to you!
            </div>
        @endif
        
        <form method="POST" action="{{ auth()->user()->two_factor_secret ? route('two-factor.disable', ['active', true]) : route('two-factor.enable', ['active', false]) }}" class="otp">
            @method('POST')
            @csrf
            
            <div class="mb-3">
                OTP
            </div>

            @if (auth()->user()->two_factor_secret)
                {{-- QR Code --}}
                <div class="mb-3">
                    {!! auth()->user()->twoFactorQrCodeSvg() !!}
                </div>
            @endif

            @if (auth()->user()->two_factor_secret)
                {{-- Recovery Codes --}}
                <div class="mb-3">
                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Recovery Codes:') }}
                    </p>
                    @foreach ((array) auth()->user()->recoveryCodes() as $recoveryCode)
                        <p class="mt-1 mb-1 text-sm text-gray-600">
                            {{ $recoveryCode }}
                        </p>
                    @endforeach
                </div>
            @endif
             
            <div class="mb-3">
                @if (auth()->user()->two_factor_secret)
                    @method('DELETE')
                    <input type="submit" value="Disabled" class="btn btn-danger" />
                @else
                    @method('POST')
                    <input type="submit" value="Enabled" class="btn btn-primary" />
                @endif
            </div>
            
        </form>
    </div>
</div>