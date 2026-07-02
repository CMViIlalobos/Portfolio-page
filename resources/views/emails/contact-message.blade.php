<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>New portfolio contact message</title>
</head>
<body style="margin: 0; background: #f3ede3; color: #2a2622; font-family: Arial, sans-serif;">
    <div style="max-width: 640px; margin: 0 auto; padding: 32px 20px;">
        <div style="border: 1px solid #d6cbb8; background: #fbf6ed; padding: 28px;">
            <p style="margin: 0 0 8px; color: #b53b3b; font-size: 12px; font-weight: 700; letter-spacing: 0.12em; text-transform: uppercase;">
                Portfolio contact
            </p>
            <h1 style="margin: 0 0 24px; color: #2a2622; font-size: 26px; line-height: 1.3;">
                {{ $contact['subject'] }}
            </h1>

            <table role="presentation" style="width: 100%; border-collapse: collapse; margin-bottom: 24px;">
                <tr>
                    <td style="padding: 10px 0; border-top: 1px solid #d6cbb8; color: #605748; font-size: 13px; font-weight: 700; text-transform: uppercase;">Name</td>
                    <td style="padding: 10px 0; border-top: 1px solid #d6cbb8; text-align: right;">{{ $contact['name'] }}</td>
                </tr>
                <tr>
                    <td style="padding: 10px 0; border-top: 1px solid #d6cbb8; color: #605748; font-size: 13px; font-weight: 700; text-transform: uppercase;">Email</td>
                    <td style="padding: 10px 0; border-top: 1px solid #d6cbb8; text-align: right;">
                        <a href="mailto:{{ $contact['email'] }}" style="color: #b53b3b;">{{ $contact['email'] }}</a>
                    </td>
                </tr>
            </table>

            <div style="border: 1px solid #d6cbb8; background: #fffaf0; padding: 20px; white-space: pre-line; line-height: 1.7;">
                {{ $contact['message'] }}
            </div>
        </div>
    </div>
</body>
</html>
