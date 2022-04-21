<!DOCTYPE html>
<html>

<head>
    <title>M88 #1 movie site</title>
</head>

<body>
    <h1>{{ $details['title'] }}</h1>
    <p>{{ $details['body'] }}</p>
    <p>Forgot Password <a
            href="{{ URL::temporarySignedRoute('forgot-password', now()->addMinutes(5), ['email' => $details['email'],'token' => $details['token']]) }}">
            Click
            here</a>
    </p>
    <p>Thank you</p>
</body>

</html>
