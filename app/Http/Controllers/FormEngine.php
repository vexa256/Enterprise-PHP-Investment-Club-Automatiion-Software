<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use DB;

class FormEngine extends Controller {

    public function Form($TableName) {

        $Form = [];

        $schema = DB::getDoctrineSchemaManager();

        $tables = $schema->listTables();

        foreach ($tables as $table) {

            if ($table->getName() == $TableName) {

                foreach ($table->getColumns() as $column) {

                    $Form[] = [

                        'name' => $column->getName(),
                        'type' => $column->getType()->getName(),

                    ];

                }

            }

        }

        return $Form;

    }

}
