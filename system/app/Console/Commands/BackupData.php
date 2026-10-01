<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use PDO;
use ZipArchive;

class BackupData extends Command
{
    protected $signature = 'backup:data
        {--keep=30 : Number of backups to keep }';

    protected $description = 'Back up the database and uploaded files into a single dated archive';

    public function handle()
    {
        $backupDir = storage_path('app/backups');

        if (! is_dir($backupDir)) {
            mkdir($backupDir, 0755, true);
        }

        $stamp = now()->format('Y-m-d_H-i-s');
        $tmpDir = storage_path('app/backups/.tmp-'.$stamp);
        $dbTmp = $tmpDir.DIRECTORY_SEPARATOR.'database.sqlite';
        $publicDir = storage_path('app/public');
        $archive = $backupDir.DIRECTORY_SEPARATOR.'hris-backup-'.$stamp.'.zip';

        mkdir($tmpDir, 0755, true);

        try {
            $pdo = new PDO('sqlite:'.database_path('database.sqlite'));
            $pdo->exec('PRAGMA busy_timeout = 5000');
            $pdo->exec("VACUUM INTO '".str_replace("'", "''", $dbTmp)."'");
        } catch (\Throwable $e) {
            $this->error('Database snapshot failed: '.$e->getMessage());
            $this->delTree($tmpDir);

            return self::FAILURE;
        }

        if (is_dir($publicDir)) {
            $this->copyDir($publicDir, $tmpDir.DIRECTORY_SEPARATOR.'public');
        }

        if ($this->zipDir($tmpDir, $archive)) {
            $this->delTree($tmpDir);
            $this->info('Backup created: '.$archive);
        } else {
            $this->warn('Zip creation failed; keeping un-archived copy at: '.$tmpDir);
        }

        $this->prune($backupDir, (int) $this->option('keep'));

        return self::SUCCESS;
    }

    protected function copyDir($source, $destination)
    {
        if (! is_dir($destination)) {
            mkdir($destination, 0755, true);
        }

        foreach (scandir($source) as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }

            $from = $source.DIRECTORY_SEPARATOR.$entry;
            $to = $destination.DIRECTORY_SEPARATOR.$entry;

            if (is_dir($from)) {
                $this->copyDir($from, $to);
            } else {
                copy($from, $to);
            }
        }
    }

    protected function zipDir($source, $archivePath)
    {
        if (! class_exists(ZipArchive::class)) {
            return false;
        }

        $zip = new ZipArchive;

        if ($zip->open($archivePath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return false;
        }

        $source = rtrim(str_replace('\\', '/', $source), '/').'/';

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($source, \FilesystemIterator::SKIP_DOTS)
        );

        foreach ($iterator as $file) {
            $name = str_replace('\\', '/', $file);
            if (! str_starts_with($name, $source)) {
                continue;
            }
            $zip->addFile($file, substr($name, strlen($source)));
        }

        return $zip->close();
    }

    protected function delTree($dir)
    {
        if (! is_dir($dir)) {
            return;
        }

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($dir, \FilesystemIterator::SKIP_DOTS),
            \RecursiveIteratorIterator::CHILD_FIRST
        );

        foreach ($iterator as $item) {
            if ($item->isDir()) {
                rmdir($item->getPathname());
            } else {
                unlink($item->getPathname());
            }
        }

        rmdir($dir);
    }

    protected function prune($backupDir, $keep)
    {
        $backups = glob($backupDir.DIRECTORY_SEPARATOR.'hris-backup-*.zip') ?: [];

        usort($backups, fn ($a, $b) => strcmp($a, $b));

        while (count($backups) > $keep) {
            $old = array_shift($backups);
            @unlink($old);
            $this->info('Pruned old backup: '.$old);
        }
    }
}
