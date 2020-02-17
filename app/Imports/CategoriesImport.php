<?php

namespace App\Imports;

use App\Category;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CategoriesImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        $this->setDefaultStatus();
        foreach ($collection as $key => $row) {
            if ($key != 0) {
                $this->getColumns($row);
            }
        }
    }

    private function getColumns($row)
    {
        foreach ($row as $index => $column) {
            if ($column != null) {
                $categoryId = null;

                if ($index != 0) {
                    $categoryId = Category::where('name', $row[$index-1])->first()->id ?? null;
                }

                Category::firstOrCreate([
                    'name' => $column,
                    'parent_id' => $categoryId,
                    'status' => 1
                ]);
            }
        }

        $this->setNewDateStatus();
    }

    private function setDefaultStatus()
    {
        Category::query()->update(['status' => 0]);
    }

    private function setNewDateStatus()
    {
        Category::where('status', 0)->delete();
    }
}
