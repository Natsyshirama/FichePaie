<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de la Fiche de Paie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Détails de la Fiche de Paie</h1>

        <h2>Informations de l'Employé</h2>
        <p>ID Employé: {{ $data['id_employer'] }}</p>
        <p>Mois: {{ $data['mois'] }}</p>
        <p>Année: {{ $data['annee'] }}</p>

        <h2>Détails du Contrat</h2>
        <table class="table table-bordered">
            <tr>
                <th>Taux journalieres</th>
                <th>Taux Horaire</th>
                
                <th>Salaire Mensuel</th>
            </tr>
            <tr>
                
                <td>{{ $data['tauxjour'] }}</td>
                <td>{{ $data['tauxHoraraire'] }}</td>
                
                <td>{{ $data['salaire_mensuel'] }}</td>
            </tr>
        </table>

        <h2>Détails des Congés</h2>
        @if ($data['durre_conge'] > 0 && count($data['demandesConges']) > 0)
        <table class="table table-bordered">
            <tr>
                <th>Date de Début</th>
                <th>Date de Fin</th>
                <th>Durée</th>
            </tr>
            @foreach ($data['demandesConges'] as $demande)
            <tr>
                <td>{{ $demande->dateDebut }}</td>
                <td>{{ $demande->dateFin }}</td>
                <td>{{ $demande->duree }}</td>
            </tr>
            @endforeach
        </table>
        @else  <p>Aucun congé enregistré pour le mois demandé.</p>
        @endif
        <h2>Détails du Salaire</h2>
        <p>Montant des Congés: {{ $data['montant_conge'] }}</p>
        <p>Retenue CNAPS: {{ $data['retenue_cnaps'] }}</p>
        <p>Retenue Assurance Maladie: {{ $data['retenue_assurance'] }}</p>
        <p>Salaire Net: {{ $data['salaire_net'] }}</p>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>