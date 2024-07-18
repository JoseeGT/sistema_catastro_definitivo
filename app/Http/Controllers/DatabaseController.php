<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DatabaseController extends Controller
{
    public function import(Request $request)
    {
        $request->validate([
            'database_file' => 'required|file|mimes:sql',
        ]);

        $file = $request->file('database_file');

        // Almacenar el archivo subido temporalmente
        $path = $file->storeAs('backups', $file->getClientOriginalName());

        // Ruta completa al archivo
        $filePath = storage_path('app/' . $path);

        // Ejecutar el comando de importación de la base de datos
        $command = sprintf(
            'mysql --user=%s --password=%s --host=%s %s < %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.host'),
            config('database.connections.mysql.database'),
            $filePath
        );

        exec($command);

        return redirect()->back()->with('success', 'Base de datos importada correctamente.');
    }
}
