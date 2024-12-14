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

        <form action="{{ route('fichePaie.generate') }}" method="GET">
            <div class="form-group">
                <label for="id_employer">ID Employé</label>
                <input type="number" class="form-control" id="id_employer" name="id_employer" required>
            </div>
            <div class="form-group">
                <label for="mois">Mois</label>
                <input type="number" class="form-control" id="mois" name="mois" min="1" max="12" required>
            </div>
            <div class="form-group">
                <label for="annee">Année</label>
                <input type="number" class="form-control" id="annee" name="annee" required>
            </div>
            <button type="submit" class="btn btn-primary">Générer Fiche de Paie</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>