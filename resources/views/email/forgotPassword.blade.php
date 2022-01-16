<table style="background: #f7f9fa;padding: 24px;" width="100%" cellspacing="0" cellpadding="0">
    <tbody>
        <tr>
            <td>&nbsp;</td>
            <td style="width: 600px;font-family: 'Nunito', sans-serif;background: white;padding: 25px;">
                <div style="margin-bottom: 20px;">
                    <img src="https://drive.google.com/uc?export=view&id=1cUvLFt3dnJd649fIBiFo0-5UifQn6uJc">
                </div>
                <div>
                    <div style="margin-bottom: 15px;">
                        <h1>Reset Password</h1>
                    </div>
                    <p style="font-size: 16px">Seems like you forgot your password for Tutungan. if this is true, click below to reset your password</p>
                    <a style="-webkit-appearance: button;
    -moz-appearance: button;
    appearance: button;
    text-decoration: none;
    background: #FFD901;color:
    black;width: 200px;padding:
    15px;border-radius: 9px;
    border: none;margin: 15px 0"
                       href="{{route('resetPassword', $token)}}">Reset My Password</a>
{{--                    <form action="{{route('resetPassword', $token)}}" method="GET">--}}
{{--                        <button type="submit" >Reset My Password</button>--}}
{{--                    </form>--}}
                    <p style="font-size: 16px">if you did not forgot your password, you can safely ignore this email.</p>
                </div>
            </td>
            <td>&nbsp;</td>
        </tr>
    </tbody>
</table>

