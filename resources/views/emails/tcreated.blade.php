

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Terminal Created</title>
</head>
<body>
    <h1>Terminal créé avec succès</h1>

    <p>Détails du terminal :</p>
    <ul>
        <li>Nom : {{ $terminal->nom }}</li>
        <li>Emplacement : {{ $terminal->emplacement }}</li>
        <li>Date de mise en service : {{ $terminal->date_mise_en_service }}</li>
    </ul>
</body>
</html>
