<!DOCTYPE html>
<html>

<head>
    <title>M88 #1 movie site</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>To verify email <a
            href="{{ URL::temporarySignedRoute('verify-email', now()->addMinutes(25), ['email' => $details['email'],'token' => $details['token']]) }}">
            Click
            here</a>
    </p>
    <p>Thank you</p>
</body>

</html>
