<!DOCTYPE html>
<html>
<head>
    <title>New Contact Message</title>
</head>
<body>
    <h2>New Contact Message Received</h2>
    
    <p><strong>From:</strong> {{ $name }}</p>
    <p><strong>Email:</strong> {{ $email }}</p>
    <p><strong>Phone:</strong> {{ $phone }}</p>
    <p><strong>Subject:</strong> {{ $subject }}</p>
    
    <h3>Message:</h3>
    <p>{{ $messageContent }}</p>
    
    <hr>
    <p>This message was sent from the contact form on Sara Shop website.</p>
</body>
</html>