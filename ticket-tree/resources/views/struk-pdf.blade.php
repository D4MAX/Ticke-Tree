<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: sans-serif;
            font-size: 12px;
            margin: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .title {
            font-size: 20px;
            font-weight: bold;
        }

        table {
            width: 100%;
            margin-top: 10px;
            border-collapse: collapse;
        }

        td {
            padding: 6px;
            vertical-align: top;
        }

        .label {
            font-weight: bold;
            width: 140px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 11px;
            color: #555;
        }

        .box {
            border: 1px solid #ccc;
            padding: 12px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

    <div class="header">
        <div class="title">Struk Pembuatan Event</div>
        <div>TickeTree System</div>
        <hr>
    </div>

    <div class="box">
        <table>
            <tr>
                <td class="label">ID Tiket</td>
                <td>{{ $event->id_tiket }}</td>
            </tr>

            <tr>
                <td class="label">Nama Event</td>
                <td>{{ $event->nama_event }}</td>
            </tr>

            <tr>
                <td class="label">Deskripsi</td>
                <td>{{ $event->deskripsi_event ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Kategori</td>
                <td>{{ $event->kategori_event ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tanggal Event</td>
                <td>{{ $event->tanggal_event }}</td>
            </tr>

            <tr>
                <td class="label">Kuota</td>
                <td>{{ $event->kuota_event }} Orang</td>
            </tr>

            <tr>
                <td class="label">Status</td>
                <td style="text-transform: capitalize;">{{ $event->status_event }}</td>
            </tr>

            <tr>
                <td class="label">Harga Tiket</td>
                <td>Rp {{ number_format($event->harga_event, 0, ',', '.') }}</td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <hr>
        <p>Struk ini dibuat otomatis oleh sistem TickeTree • {{ date('d/m/Y H:i') }}</p>
    </div>

</body>
</html>
