<!-- resources/views/emails/test.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Gamma Alpha Welcome Email</title>
</head>

<body>
    <h1>Hello!</h1>
    <p>This is a test email from Laravel.</p>
    <br />
    <table>
    <tr>
        <td style="vertical-align: top;">
        <img src="{{asset('assets/images/custom-1/download.png') }}" alt="shield" width="100" height="100">
        </td>
        <td style="vertical-align: top; padding-left: 10px;">
        <p>Your top-aligned text goes here.</p>
        <p>You can add multiple lines or even other HTML</p>
        <p>content like lists, bold text, etc.</p>
        </td>
    </tr>
    </table>
</body>

</html>