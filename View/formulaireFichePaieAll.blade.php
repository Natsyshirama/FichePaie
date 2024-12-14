<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Générer la Fiche de Paie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Générer la Fiche de Paie</h1>

        <form action="{{ route('fichePaie.generateAll') }}" method="GET">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <input type="number" class="form-control" name="mois" placeholder="Mois" min="1" max="12" required>
                </div>
                <div class="col-md-4">
                    <input type="number" class="form-control" name="annee" placeholder="Année" required>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success btn-block">Générer Toutes les Fiches</button>
                </div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>