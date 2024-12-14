<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER after_demande_conge_update
            AFTER UPDATE ON demande_conge
            FOR EACH ROW
            BEGIN
                IF NEW.etat = 1 AND OLD.etat != 1 THEN
                    INSERT INTO demande_valider (id_demandeConge, created_at, updated_at)
                    VALUES (NEW.id, NOW(), NOW());
                END IF;
            END;
        ');
    }

    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_demande_conge_update');
    }
};
