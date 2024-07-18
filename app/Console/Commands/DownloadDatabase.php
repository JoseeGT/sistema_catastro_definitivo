<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DownloadDatabase extends Command
{
    protected $signature = 'db:download';

    protected $description = 'Download the database as a SQL dump file';

    public function handle()
    {
        $databaseName = config('database.connections.mysql.database');
        $backupFileName = storage_path('backups/' . $databaseName . '-' . date('YmdHis') . '.sql');

        $command = sprintf(
            'mysqldump --user=%s --password=%s --host=%s %s > %s',
            config('database.connections.mysql.username'),
            config('database.connections.mysql.password'),
            config('database.connections.mysql.host'),
            $databaseName,
            $backupFileName
        );

        $returnVar = null;
        $output = null;
        exec($command, $output, $returnVar);

        $this->info('Database backed up successfully to: ' . $backupFileName);

        return response()->download($backupFileName)->deleteFileAfterSend(true);
    }
}
