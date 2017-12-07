<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\Food_typeRequest as StoreRequest;
use App\Http\Requests\Food_typeRequest as UpdateRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Box\Spout\Reader;
use Box\Spout\Writer;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;

class Food_typeCrudController extends CrudController
{

    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Food_type');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/food_type');
        $this->crud->setEntityNameStrings('food_type', 'food_types');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

//        $this->crud->setFromDb();
        $this->crud->setListView("backpack::crud.list_foods");
        // ------ CRUD FIELDS
        $this->crud->addField([
            // MANDATORY
            'name'  => 'id', // DB column name (will also be the name of the input)
            'label' => 'ID', // the human-readable label for the input
            'type'  => 'text', // the field type (text, number, select, checkbox, etc)
        ], 'update');
         $this->crud->addFields([
             [
                 // MANDATORY
                 'name'  => 'name', // DB column name (will also be the name of the input)
                 'label' => 'Name', // the human-readable label for the input
                 'type'  => 'text', // the field type (text, number, select, checkbox, etc)
             ],
             [
                 // MANDATORY
                 'name'  => 'description', // DB column name (will also be the name of the input)
                 'label' => 'Description', // the human-readable label for the input
                 'type'  => 'text', // the field type (text, number, select, checkbox, etc)
             ],
             [
                 // MANDATORY
                 'name'  => 'image', // DB column name (will also be the name of the input)
                 'label' => 'Image', // the human-readable label for the input
                 'type'  => 'text', // the field type (text, number, select, checkbox, etc)
             ],
         ], 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
         $this->crud->addColumns([
             ['name' => 'id', // The db column name
                 'label' => "ID", // Table column heading
                 'type' => 'text'],
             ['name' => 'name', // The db column name
                 'label' => "Name", // Table column heading
                 'type' => 'text'],
             ['name' => 'description', // The db column name
                 'label' => 'Description', // Table column heading
                 'type' => 'text'],
             ['name' => 'image', // The db column name
                 'label' => 'Image', // Table column heading
                 'type' => 'text'],
         ]); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
        // $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\buttons
        // $this->crud->removeButton($name);
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
        // $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
        // $this->crud->denyAccess(['list', 'create', 'update', 'reorder', 'delete']);

        // ------ CRUD REORDER
        // $this->crud->enableReorder('label_name', MAX_TREE_LEVEL);
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('reorder');

        // ------ CRUD DETAILS ROW
        // $this->crud->enableDetailsRow();
        // NOTE: you also need to do allow access to the right users: $this->crud->allowAccess('details_row');
        // NOTE: you also need to do overwrite the showDetailsRow($id) method in your EntityCrudController to show whatever you'd like in the details row OR overwrite the views/backpack/crud/details_row.blade.php

        // ------ REVISIONS
        // You also need to use \Venturecraft\Revisionable\RevisionableTrait;
        // Please check out: https://laravel-backpack.readme.io/docs/crud#revisions
        // $this->crud->allowAccess('revisions');

        // ------ AJAX TABLE VIEW
        // Please note the drawbacks of this though:
        // - 1-n and n-n columns are not searchable
        // - date and datetime columns won't be sortable anymore
        // $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
        // $this->crud->enableExportButtons();

        // ------ ADVANCED QUERIES
        // $this->crud->addClause('active');
        // $this->crud->addClause('type', 'car');
        // $this->crud->addClause('where', 'name', '==', 'car');
        // $this->crud->addClause('whereName', 'car');
        // $this->crud->addClause('whereHas', 'posts', function($query) {
        //     $query->activePosts();
        // });
        // $this->crud->addClause('withoutGlobalScopes');
        // $this->crud->addClause('withoutGlobalScope', VisibleScope::class);
        // $this->crud->with(); // eager load relationships
        // $this->crud->orderBy();
        // $this->crud->groupBy();
        // $this->crud->limit();
    }

    public function ImportExcelAction()
    {
        if(isset($_FILES['excelFile']))
        {
            $target_file = basename($_FILES["excelFile"]["name"]);
            $des_file = 'uploads/' . basename($_FILES["excelFile"]["name"]);
            $excelFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $title = ["id",'name','description','image'];
            if($excelFileType != "xlsx" ) {
                return redirect()->back()->with("error","Sorry, only XLSX files are allowed.");
            }
            else {
                move_uploaded_file($_FILES["excelFile"]["tmp_name"], $des_file);
                $this->import_foodtypeDB($des_file,$title);
            }
        }
        return redirect()->back();
    }

    public function import_foodtypeDB($file_name,$title){
        $reader = Reader\ReaderFactory::create(Type::XLSX); // for XLSX files
        //$reader = ReaderFactory::create(Type::CSV); // for CSV files
        //$reader = ReaderFactory::create(Type::ODS); // for ODS files

        $reader->open($file_name);

        foreach ($reader->getSheetIterator() as $sheet) {
            foreach ($sheet->getRowIterator() as $key=>$row) {
                // do stuff with the row
                if($key==1){
                    $arr_diff = array_diff($title,$row);
                    if(count($arr_diff)!=0){
                        $reader->close();
                        unlink($file_name);
                        return redirect()->back()->with("error","Excel file not match pattern");
                    }
                }
                else{
                    if($row[0]!="" && gettype($row[0])!="integer"){
                        $reader->close();
                        unlink($file_name);
                        return redirect()->back()->with("error","False Value Type");
                    }
                    $count_id = DB::table("food_type")->where("id",$row[0])->count();
                    if($count_id>0){
                        //Update
                        DB::table("food_type")->where("id",$row[0])->update([
                            "name"=>$row[1],
                            "description"=>$row[2],
                            "image"=>$row[3]
                        ]);
                    }else{
                        //Insert
                        DB::table('food_type')->insert([
                            "id"=>$row[0],
                            "name"=>$row[1],
                            "description"=>$row[2],
                            "image"=>$row[3]
                        ]);
                    }
                }
            }
        }
        $reader->close();
    }

    public function ExportExcelAction()
    {
        $food_type = DB::table("food_type")->get();
        $table_title = ["id",'name','description','image'];
        $oExcel =  Writer\WriterFactory::create(Type::XLSX); // for XLSX files
        $oExcel->openToBrowser("food-type.xlsx");

        $oExcel->addRowWithStyle($table_title,(new StyleBuilder())->setFontBold()->setFontSize(14)->build());
        foreach ($food_type as $sheet){
            $oExcel->addRow(get_object_vars($sheet));
        }
        $oExcel->close();
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
