<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\FoodsRequest as StoreRequest;
use App\Http\Requests\FoodsRequest as UpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Box\Spout\Reader;
use Box\Spout\Writer;
use Box\Spout\Common\Type;
use Box\Spout\Writer\Style\StyleBuilder;

class FoodsCrudController extends CrudController
{

    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Foods');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/foods');
        $this->crud->setEntityNameStrings('foods', 'foods');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->crud->setListView("backpack::crud.list_foods");
//        $this->crud->setFromDb();

        // ------ CRUD FIELDS
         $this->crud->addField([
             // MANDATORY
             'name'  => 'id', // DB column name (will also be the name of the input)
             'label' => 'ID', // the human-readable label for the input
             'type'  => 'text', // the field type (text, number, select, checkbox, etc)
         ], 'update');
         $this->crud->addFields(
             [
                 [
                        // MANDATORY
                     'name'  => 'name', // DB column name (will also be the name of the input)
                     'label' => 'Name', // the human-readable label for the input
                     'type'  => 'text', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'id_type', // DB column name (will also be the name of the input)
                     'label' => 'ID Type', // the human-readable label for the input
                     'type'  => 'select2', // the field type (text, number, select, checkbox, etc)
                     'entity' => 'food_type',
                     'attribute' => 'id',
                     'model' => "App\Models\Food_type"
                 ],

                 [
                     // MANDATORY
                     'name'  => 'summary', // DB column name (will also be the name of the input)
                     'label' => 'Summary', // the human-readable label for the input
                     'type'  => 'text', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'detail', // DB column name (will also be the name of the input)
                     'label' => 'Detail', // the human-readable label for the input
                     'type'  => 'textarea', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'price', // DB column name (will also be the name of the input)
                     'label' => 'Price', // the human-readable label for the input
                     'type'  => 'number', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'price', // DB column name (will also be the name of the input)
                     'label' => 'Price', // the human-readable label for the input
                     'type'  => 'number', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'promotion_price', // DB column name (will also be the name of the input)
                     'label' => 'Promotion Price', // the human-readable label for the input
                     'type'  => 'number', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'promotion', // DB column name (will also be the name of the input)
                     'label' => 'Promotion', // the human-readable label for the input
                     'type'  => 'text', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'image', // DB column name (will also be the name of the input)
                     'label' => 'Image', // the human-readable label for the input
                     'type'  => 'text', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'updated_at', // DB column name (will also be the name of the input)
                     'label' => 'Update At', // the human-readable label for the input
                     'type'  => 'date', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'updated_at', // DB column name (will also be the name of the input)
                     'label' => 'Update At', // the human-readable label for the input
                     'type'  => 'date', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'unit', // DB column name (will also be the name of the input)
                     'label' => 'Unit', // the human-readable label for the input
                     'type'  => 'text', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'today', // DB column name (will also be the name of the input)
                     'label' => 'Today', // the human-readable label for the input
                     'type'  => 'checkbox', // the field type (text, number, select, checkbox, etc)
                 ],

                 [
                     // MANDATORY
                     'name'  => 'id_url', // DB column name (will also be the name of the input)
                     'label' => 'ID URL', // the human-readable label for the input
                     'type'  => 'text', // the field type (text, number, select, checkbox, etc)
                 ],
             ]
             , 'update/create/both');
//         $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
         $this->crud->addColumns([
             ['name' => 'id', // The db column name
             'label' => "ID", // Table column heading
             'type' => 'text'],

             ['name' => 'name', // The db column name
                 'label' => 'name', // Table column heading
                 'type' => 'text'],

             ['name' => 'id_type', // The db column name
                 'label' => 'ID Type', // Table column heading
                 'type' => 'text'],

             ['name' => 'summary', // The db column name
                 'label' => 'Summary', // Table column heading
                 'type' => 'text'],

             ['name' => 'detail', // The db column name
                 'label' => 'Detail', // Table column heading
                 'type' => 'text'],

             ['name' => 'price', // The db column name
                 'label' => 'Price', // Table column heading
                 'type' => 'text'],

             ['name' => 'promotion_price', // The db column name
                 'label' => "Promotion Price", // Table column heading
                 'type' => 'text'],

             ['name' => 'promotion', // The db column name
                 'label' => "Promotion", // Table column heading
                 'type' => 'text'],

             ['name' => 'image', // The db column name
                 'label' => "Image", // Table column heading
                 'type' => 'text'],

             ['name' => 'update_at', // The db column name
                 'label' => "updated at", // Table column heading
                 'type' => 'date'],

             ['name' => 'unit', // The db column name
                 'label' => "Unit", // Table column heading
                 'type' => 'text'],

             ['name' => 'today', // The db column name
                 'label' => "Today", // Table column heading
                 'type' => 'text'],

             ['name' => 'id_url', // The db column name
                 'label' => "ID URL", // Table column heading
                 'type' => 'text']
         ]); // add a single column, at the end of the stack
//         $this->crud->addColumns(); // add multiple columns, at the end of the stack
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
            $title = ["id",'id_type','name','summary','detail','price','promotion_price','promotion','image','update_at','unit','today','id_url'];
            if($excelFileType != "xlsx" ) {
                return redirect()->back()->with("error","Sorry, only XLSX files are allowed.");
            }
            else {
                move_uploaded_file($_FILES["excelFile"]["tmp_name"], $des_file);
                $this->import_foodDB($des_file,$title);
            }
        }
        return redirect()->back();
    }

    public function import_foodDB($file_name,$title){
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
                elseif($key!=1 && $row[0] != ""){
                    if(gettype($row[0])!="integer" || gettype($row[5])!="integer" || gettype($row[6])!="integer" || gettype($row[11])!="integer" || gettype($row[12])!="integer" || gettype($row[1])!="integer"){
                        $reader->close();
                        unlink($file_name);
                        return redirect()->back()->with("error","False Value Type");
                    }
                    $count_id = DB::table("foods")->where("id",$row[0])->count();
                    if($count_id>0){
                        //Update
                        DB::table("foods")->where("id",$row[0])->update([
                            "id_type"=>$row[1],
                            "name"=>$row[2],
                            "summary"=>$row[3],
                            "detail"=>$row[4],
                            "price"=>$row[5],
                            "promotion_price"=>$row[6],
                            "promotion"=>$row[7],
                            "image"=>$row[8],
                            "update_at"=>$row[9],
                            "unit"=>$row[10],
                            "today"=>$row[11],
                            "id_url"=>$row[12]
                        ]);
                    }else{
                        //Insert
                        DB::table('foods')->insert([
                            "id"=>$row[0],
                            "id_type"=>$row[1],
                            "name"=>$row[2],
                            "summary"=>$row[3],
                            "detail"=>$row[4],
                            "price"=>$row[5],
                            "promotion_price"=>$row[6],
                            "promotion"=>$row[7],
                            "image"=>$row[8],
                            "update_at"=>$row[9],
                            "unit"=>$row[10],
                            "today"=>$row[11],
                            "id_url"=>$row[12]
                        ]);
                    }
                }
            }
        }
        $reader->close();
    }

    public function ExportExcelAction()
    {
        $foods = DB::table("foods")->get();
        $table_title = ["id",'id_type','name','summary','detail','price','promotion_price','promotion','image','update_at','unit','today','id_url'];
        $oExcel =  Writer\WriterFactory::create(Type::XLSX); // for XLSX files
        $oExcel->openToBrowser("foods.xlsx");

        $oExcel->addRowWithStyle($table_title,(new StyleBuilder())->setFontBold()->setFontSize(14)->build());
        foreach ($foods as $sheet){
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
