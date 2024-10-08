<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Message</title>
</head>
<body>
<h2>New Contact Message</h2>
<p><strong>Name:</strong> {{ $request['name'] }}</p>
<p><strong>Phone:</strong> {{ $request['phone'] }}</p>
<p><strong>Email:</strong> {{ $request['email'] }}</p>
<p><strong>Subject:</strong> {{ $request['subject'] }}</p>
<p><strong>Message:</strong></p>
<p>{{ $request['message'] }}</p>
</body>
</html>
