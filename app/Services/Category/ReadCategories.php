<?php
namespace App\Services\Category;

use App\Imports\CategoriesImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ReadCategories
{
    /**
     * @var array
     */
    private $files = [];

    /**
     * @var string
     */
    private $regexPattern = "/kategoriler-(\d+).xlsx/";

    public function findLatestXlsx()
    {
        $fileDate = $this->getLatestXlsFileName();
        $fileFullPath = "categories/kategoriler-{$fileDate}.xlsx";

        $this->importCategories($fileFullPath);
    }

    /**
     * @return string
     */
    public function getLatestXlsFileName()
    {
        $this->files = Storage::disk('ftp')->files('categories');
        $processFilesDates = [];

        foreach ($this->files as $file) {
            $fileName = str_replace('categories/', '', $file);

            if (preg_match($this->regexPattern, $fileName, $out)) {
                array_push($processFilesDates, $out[1]);
            }
        }

        return max($processFilesDates);
    }

    /**
     * @param $fileFullPath
     */
    private function importCategories($fileFullPath)
    {
        Excel::import(new CategoriesImport, $fileFullPath, 'ftp');
    }
}
