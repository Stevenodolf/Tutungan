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
                    <h1>Email Verification</h1>
                </div>
                <p style="font-size: 16px;padding: 15px 0;">You just registered to Tutungan, Please click 'Verify Now' to verify your email</p>
                <a style="-webkit-appearance: button;
                                -moz-appearance: button;
                                appearance: button;
                                text-decoration: none;
                                background: #FFD901;color:
                                black;width: 200px;padding:
                                15px;border-radius: 9px;
                                border: none;
                                margin: 15px 0;"

                   href="{{route('userVerify', $token)}}">Verify Now</a>
            </div>
        </td>
        <td>&nbsp;</td>
    </tr>
    </tbody>
</table>
