<!-- resources/views/agenda/show.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Agenda</title>
</head>
<body>
    <h1>{{ $agenda->judul_agenda }}</h1>
    <p>{{ $agenda->isi_agenda }}</p>
    <p>Tanggal Acara: {{ $agenda->tgl_agenda }}</p>
    <p>Tanggal Posting: {{ $agenda->tgl_post_agenda }}</p>
</body>
</html>
