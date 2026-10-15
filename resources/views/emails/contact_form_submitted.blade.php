<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zatražen upit za kompletan cjenik klima - Klima Webshop</title>
</head>
<body style="font-family: Arial, sans-serif; color: #333; line-height: 1.6;">
    <h3 style="color: #0284c7;">Zaprimljen novi upit za cjenik</h3>
    <p><strong>Ime:</strong> {{ $data['name'] }}</p>
    <p><strong>Email:</strong> {{ $data['email'] }}</p>
    <p><strong>Poruka:</strong></p>
    <p style="background: #f9fafb; padding: 10px; border-left: 4px solid #0284c7;">{{ $data['message'] }}</p>
</body>
</html>