@component('mail::layout')
    @slot('header')        
    @endslot
    <div style="width: 100%; text-align: center;">
        <h1 align="center" style="font-size: 30px; text-align: center;">Forgot Password</h1>
        <img src="{{ $logo }}" style="width: 145px;" />        
        <p style="color: #5f6368; text-align: center; margin-bottom: 0;">
            We have received your request to reset your password. Please click the link below to redirect you to the password reset page.
        </p>
        <a href="{{ $action }}" style="background-color: #00aaf2;border: none;color: white;width: 175px;height: 40px;line-height:13px;border-radius: 6px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;">
            Reset Password
        </a>            
        <p style="color: #5f6368; text-align: center;">
            © {{ date('Y') }} {{ config('app.name') }}
        </p>
    </div>
    @slot('footer')                
    @endslot
@endcomponent