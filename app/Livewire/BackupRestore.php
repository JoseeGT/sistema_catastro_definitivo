<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Livewire\WithFileUploads;
use WireUi\Traits\WireUiActions;

class BackupRestore extends Component
{
    use WithFileUploads;
    use WireUiActions;

    public $backupFile;


    public function backupDatabase()
    {
        $this->exportDatabaseToSql();

        // Generar la respuesta de descarga
        $fileName = 'Base_de_datos_CATASTRO.sql';
        $filePath = storage_path("app/backups/{$fileName}");
        
        return Response::download($filePath);
    }

    private function exportDatabaseToSql()
    {
        $tables = [
            'users',
            'propietarios',
            'sectores',
            'calles',
            'inmuebles',
            'codigos_catastrales',
            'inmuebles_documentos',
            'tenencias_terrenos',
            'calculos',
            'direcciones',
            'divisiones',
            'fichas',
            'inspecciones',
            'tareas',
            'tipos_construccion',
            'unificaciones',
            'auditoria',
        ];
    
        $sql = '';
    
        foreach ($tables as $tableName) {
            // Obtener el esquema de la tabla (opcional, dependiendo de tus necesidades)
            $columns = DB::connection()->getSchemaBuilder()->getColumnListing($tableName);
    
            // Verificar si la tabla tiene datos
            $count = DB::table($tableName)->count();
    
            if ($count > 0) {
                $sql .= "INSERT IGNORE INTO {$tableName} (";
                $sql .= implode(',', $columns);
                $sql .= ") VALUES\n";
    
                $data = DB::table($tableName)->get();
    
                foreach ($data as $row) {
                    $sql .= '(';
                    foreach ($columns as $column) {
                        $sql .= '"' . addslashes($row->$column) . '",';
                    }
                    $sql = rtrim($sql, ',') . "),\n";
                }
    
                $sql = rtrim($sql, ",\n") . ";\n\n";
            }
        }
    
        Storage::disk('local')->put('backups/Base_de_datos_CATASTRO.sql', $sql);
    }
public function restoreDatabase()
{
    $this->validate([
        'backupFile' => 'required|mimes:sql',
    ]);

    if ($this->backupFile) {
        $fileName = $this->backupFile->getClientOriginalName();
        $filePath = $this->backupFile->storeAs('backups', $fileName);

        // Truncate all tables before restoring
        $tables = [
            'auditoria',
            'calculos',
            'calles',
            'codigos_catastrales',
            'direcciones',
            'divisiones',
            'fichas',
            'inmuebles',
            'inmuebles_documentos',
            'inspecciones',
            'propietarios',
            'sectores',
            'tareas',
            'tenencias_terrenos',
            'tipos_construccion',
            'unificaciones',
            'users'
        ];

        try {
            DB::beginTransaction();
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');

            foreach ($tables as $table) {
                DB::table($table)->truncate();
            }

            DB::unprepared(file_get_contents(storage_path('app/' . $filePath)));

            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            DB::commit();

            session()->flash('success', 'Database restored successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            session()->flash('error', 'Error restoring database: ' . $e->getMessage());
        }
    }
    dispatch('close');
    $this->successDialog();
}
       public function successDialog(): void
    {
        $this->dialog()->show([
            'icon' => 'success',
            'title' => 'Restaurado!',
            'description' => 'la base de datos ha sido restaurada con exito.',
        ]);
    } 
    public function render()
    {
        return view('livewire.backup-restore');
    }
}
