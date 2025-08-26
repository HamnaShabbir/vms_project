<!DOCTYPE html>
<html>
<head>
    <title>Visit Confirmation</title>
</head>
<body>
    <h2>Hello {{ $visitor->name }}</h2>
    <h3> Your visit has been confirmed!</h3>

    <p><strong>Meeting time:</strong> {{ $visitor->time_of_arrival }}</p>
    <p><strong>Meeting with:</strong> {{  optional($visitor->host)->name }}</p>
    <p><strong>Company:</strong> {{ $visitor->company_name }}</p>

    <p>Please show the QR Code attached with this mail to the reception on your visit.</p>
    <p>Thanks.</p>
</body>
</html>
