<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Potvrda narudžbe</title>

    <style>
        html { font-family: Arial, Helvetica, sans-serif; }
        table, th, td { font-size: 1rem; border: 2px solid #cbd5e1; border-collapse: collapse; }
        th, td { padding: 8px 16px; }
        ul { font-size: 1rem; padding-left: 20px; }
    </style>
</head>
<body style="color: #333; line-height: 1.5;">
    <header style="margin-bottom: 20px;">
        <h1 style="color: #0284c7; margin-bottom: 5px;">Hvala Vam na narudžbi!</h1>
        <p style="color: #64748b; font-size: 0.9rem;">KLIMA WEBSHOP</p>
    </header>

    <p>Poštovani/a {{ $order->buyer_name }},</p>
    
    @if ($order->payment_method_id === 1)
        <p>Vaša narudžba <strong>#{{ $order->order_id }}</strong> je zaprimljena i nalazi se na čekanju dok ne zaprimimo uplatu po ponudi.</p>
    @elseif($order->payment_method_id === 2)
        <p>Vaša narudžba <strong>#{{ $order->order_id }}</strong> je zaprimljena. Naš tim će vas kontaktirati radi potvrde obročnog plaćanja karticom.</p>
    @elseif($order->payment_method_id === 3)
        <p>Vaša narudžba <strong>#{{ $order->order_id }}</strong> je uspješno zaprimljena. Plaćanje se vrši gotovinom prilikom isporuke i montaže.</p>
    @endif

    <div style="background: #f8fafc; padding: 15px; border-radius: 6px; margin: 20px 0;">
        <h3 style="color: #0284c7; margin-top: 0;">Podaci za uplatu (Virman / Opća uplatnica)</h3>
        <ul style="margin: 0;">
            <li>Banka: <strong>Addiko Bank d.d.</strong></li>
            <li>IBAN: <strong>HR1234567890123456789</strong></li>
            <li>Model i poziv na broj: <strong>HR01 - {{ $order->order_id }}</strong></li>
        </ul>
    </div>
    
    <h3 style="color: #0284c7;">Pregled narudžbe #{{ $order->order_id }} 
        (@php
            $dateTime = new DateTime($order->created_at);
            echo $dateTime->format('j.n.Y.');
        @endphp)
    </h3>

    <table style="margin-bottom: 16px; width: 100%;">
    <tr style="background: #f8fafc;">
        <th>Proizvod</th>
        <th>Količina</th>
        <th>Cijena</th>
    </tr>
    @foreach ($order->items as $item)
    <tr>
        <td>{{ $item->product->naslov }}</td>
        <td style="text-align: center;">{{ $item->quantity }}</td>
        <td style="text-align: right;">{{ $item->subtotal }} €</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="2"><strong>Dostava</strong></td>
        <td style="text-align: right;">Besplatna dostava</td>
    </tr>
    <tr>
        <td colspan="2"><strong>Način plaćanja</strong></td>
        <td style="text-align: right;">
            @if ($order->payment_method_id === 1)
                Plaćanje po ponudi
            @elseif($order->payment_method_id === 2)
                Plaćanje karticom na rate
            @elseif($order->payment_method_id === 3)
                Gotovinsko plaćanje
            @endif
        </td>
    </tr>
    <tr style="background: #f8fafc; font-weight: bold;">
        <td colspan="2"><strong>Ukupno</strong></td>
        <td style="text-align: right;">{{ $order->total_amount }} €</td>
    </tr>
    </table>

    <h3 style="color: #0284c7;">Adresa za dostavu</h3>
    <ul style="list-style-type: none; padding-left: 0;">
        <li>{{ $order->buyer_name }} {{ $order->buyer_lastname }}</li>
        <li>{{ $order->buyer_address }}</li>
        <li>{{ $order->buyer_city }}, {{ $order->buyer_county}} {{ $order->buyer_postal_code }}</li>
        <li>Telefon: {{ $order->buyer_phone_number }}</li>
        <li>Email: {{ $order->buyer_email }}</li>
    </ul>

    <p style="margin-top: 30px;">Veseli nas što ćemo uskoro ispuniti vašu narudžbu!<br><strong>Klima Webshop</strong></p>
</body>
</html>