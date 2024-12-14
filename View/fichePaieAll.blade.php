<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Fiches de Paie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Liste des Fiches de Paie</h1>

       
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID Employé</th>
                        <th>Salaire Mensuel</th>
                        <th>Mois</th>
                        <th>Année</th>
                        <th>Durée Congés</th>
                        <th>Montant Congés</th>
                        <th>Retenue CNAPS</th>
                        <th>Retenue Assurance</th>
                        <th>Salaire Net</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fichesPaie as $fiche)
                        <tr>
                            <td>{{ $fiche['id_employer'] }}</td>
                            <td>{{ number_format($fiche['salaire_mensuel'], 2) }} €</td>
                            <td>{{ $fiche['mois'] }}</td>
                            <td>{{ $fiche['annee'] }}</td>
                            <td>{{ $fiche['duree_conge'] }} jours</td>
                            <td>{{ number_format($fiche['montant_conge'], 2) }} €</td>
                            <td>{{ number_format($fiche['retenue_cnaps'], 2) }} €</td>
                            <td>{{ number_format($fiche['retenue_assurance'], 2) }} €</td>
                            <td>{{ number_format($fiche['salaire_net'], 2) }} €</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
       

        
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
