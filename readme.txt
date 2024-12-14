pour le declanchement automatic fonction genereFicheAll() a chaque fin du mois

- cree la commande :  php artisan make:command GenerateFichesPaie
le contenue voir GenerateFichesPaie.php
- cree fichier kernel (si mbola tsisy) dans cette chemin:  app/Console/Kernel.php
le contenue voir Kernel.php

pour declancher le commande manuellement : php artisan app:generate-fiches-paie



