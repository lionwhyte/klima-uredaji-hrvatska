<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nova narudžba zaprimljena</title>

    <style>
        html { font-family: Arial, Helvetica, sans-serif; }
        table, th, td { font-size: 1rem; border: 2px solid #cbd5e1; border-collapse: collapse; }
        th, td { padding: 8px 16px; }
        ul { font-size: 1rem; list-style-type: none; padding-left: 0; }
        li { margin-bottom: 4px; }
    </style>
</head>
<body style="color: #333; line-height: 1.5;">
    <header style="margin-bottom: 20px;">
        <h1 style="color: #0284c7; margin-bottom: 5px;">Nova narudžba: {{ $order->order_id }}</h1>
        <p style="color: #64748b; font-size: 0.9rem;">KLIMA WEBSHOP</p>
    </header>
    
    <h2>Primili ste novu narudžbu od kupca: {{ $order->buyer_name }} {{ $order->buyer_lastname }}</h2>  
    <p><strong>Datum narudžbe:</strong> 
        @php
            $dateTime = new DateTime($order->created_at);
            echo $dateTime->format('j.n.Y.');
        @endphp
    </p>

    <table style="margin-bottom: 1.5rem; width: 100%;">
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

    <h2>Kontakt i adresa za dostavu</h2>
    <hr style="border: 0; border-top: 1px solid #cbd5e1; margin-bottom: 10px;">
    <ul>
        <li><strong>Ime i prezime:</strong> {{ $order->buyer_name }} {{ $order->buyer_lastname }}</li>
        <li><strong>Ulica:</strong> {{ $order->buyer_address }}</li>
        <li><strong>Grad:</strong> {{ $order->buyer_city }}</li>
        <li><strong>Županija:</strong> {{ $order->buyer_county}}</li>
        <li><strong>Poštanski broj:</strong> {{ $order->buyer_postal_code }}</li>
        <li><strong>Telefon:</strong> {{ $order->buyer_phone_number }}</li>
        <li><strong>Email:</strong> {{ $order->buyer_email }}</li>
    </ul>
    <hr style="border: 0; border-top: 1px solid #cbd5e1; margin-top: 10px;">
</body>
</html>