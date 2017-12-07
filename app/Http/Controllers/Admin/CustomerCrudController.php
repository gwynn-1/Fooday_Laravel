<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CustomerRequest as StoreRequest;
use App\Http\Requests\CustomerRequest as UpdateRequest;
use Illuminate\Http\Request;
use Box\Spout\Reader;
use Box\Spout\Writer;
use Box\Spout\Common\Type;
use Illuminate\Support\Facades\DB;
use Box\Spout\Writer\Style\StyleBuilder;

class CustomerCrudController extends CrudController
{

    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Customer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/customer');
        $this->crud->setEntityNameStrings('customer', 'customers');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */



//        $this->crud->setFromDb();
        $this->crud->setListView("backpack::crud.list_foods");
//        $this->crud->setEditView("backpack::crud.edit_foods");
//        // ------ CRUD FIELDS
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
            ['name' => 'gender', // The db column name
                'label' => 'Gender', // Table column heading
                'type' => 'text'],
            ['name' => 'email', // The db column name
                'label' => 'Email', // Table column heading
                'type' => 'text'],
            ['name' => 'address', // The db column name
                'label' => 'Address', // Table column heading
                'type' => 'text'],
            ['name' => 'phone', // The db column name
                'label' => 'Phone', // Table column heading
                'type' => 'text'],
            ['name' => 'note', // The db column name
                'label' => 'Note', // Table column heading
                'type' => 'text'],
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
             ['name' => 'gender', // The db column name
                 'label' => 'Gender', // Table column heading
                 'type' => 'text'],
             ['name' => 'email', // The db column name
                 'label' => 'Email', // Table column heading
                 'type' => 'text'],
             ['name' => 'address', // The db column name
                 'label' => 'Address', // Table column heading
                 'type' => 'text'],
             ['name' => 'phone', // The db column name
                 'label' => 'Phone', // Table column heading
                 'type' => 'text'],
             ['name' => 'note', // The db column name
                 'label' => 'Note', // Table column heading
                 'type' => 'text'],
         ]); // add multiple columns, at the end of the stack
        // $this->crud->removeColumn('column_name'); // remove a column from the stack
        // $this->crud->removeColumns(['column_name_1', 'column_name_2']); // remove an array of columns from the stack
        // $this->crud->setColumnDetails('column_name', ['attribute' => 'value']); // adjusts the properties of the passed in column (by name)
        // $this->crud->setColumnsDetails(['column_1', 'column_2'], ['attribute' => 'value']);

        // ------ CRUD BUTTONS
        // possible positions: 'beginning' and 'end'; defaults to 'beginning' for the 'line' stack, 'end' for the others;
//         $this->crud->addButton($stack, $name, $type, $content, $position); // add a button; possible types are: view, model_function
//         $this->crud->addButtonFromModelFunction("top", "extract_excel", "extractExcel", "end"); // add a button whose HTML is returned by a method in the CRUD model
        // $this->crud->addButtonFromView($stack, $name, $view, $position); // add a button whose HTML is in a view placed at resources\views\vendor\backpack\crud\button
        // $this->crud->removeButtonFromStack($name, $stack);
        // $this->crud->removeAllButtons();
        // $this->crud->removeAllButtonsFromStack('line');

        // ------ CRUD ACCESS
//         $this->crud->allowAccess(['list', 'create', 'update', 'reorder', 'delete']);
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
//         $this->crud->enableAjaxTable();

        // ------ DATATABLE EXPORT BUTTONS
        // Show export to PDF, CSV, XLS and Print buttons on the table view.
        // Does not work well with AJAX datatables.
//         $this->crud->enableExportButtons();

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

    public function ExportExcelAction()
    {
        $customer = DB::table("customers")->get();

        $table_title = ["id",'name','gender','email','address','phone','note'];

        $oExcel =  Writer\WriterFactory::create(Type::XLSX); // for XLSX files
        $oExcel->openToBrowser("customer.xlsx");

        $oExcel->addRowWithStyle($table_title,(new StyleBuilder())->setFontBold()->setFontSize(14)->build());
        foreach ($customer as $sheet){
            $oExcel->addRow(get_object_vars($sheet));
        }
        $oExcel->close();
    }

    public function ImportExcelAction()
    {
        if(isset($_FILES['excelFile']))
        {
            $target_file = basename($_FILES["excelFile"]["name"]);
            $des_file = 'uploads/' . basename($_FILES["excelFile"]["name"]);
            $excelFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $title = ["id",'name','gender','email','address','phone','note'];
            if($excelFileType != "xlsx" ) {
                return redirect()->back()->with("error","Sorry, only XLSX files are allowed.");
            }
            else {
                move_uploaded_file($_FILES["excelFile"]["tmp_name"], $des_file);
                $this->import_CusDB($des_file,$title);
            }
        }
        return redirect()->back();
    }

    public function import_CusDB($file_name,$title){
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
                    if( gettype($row[5])!="integer" || gettype($row[0])!="integer"){
                        $reader->close();
                        unlink($file_name);
                        return redirect()->back()->with("error","False Value Type");
                    }
                    $count_id = DB::table("customers")->where("id",$row[0])->count();
                    if($count_id>0){
                        //Update
                        DB::table("customers")->where("id",$row[0])->update([
                            "name"=>$row[1],
                            "gender"=>$row[2],
                            "email"=>$row[3],
                            "address"=>$row[4],
                            "phone"=>$row[5],
                            "note"=>$row[6]
                        ]);
                    }else{
                        //Insert
                        DB::table('customers')->insert([
                            "id"=>$row[0],
                            "name"=>$row[1],
                            "gender"=>$row[2],
                            "email"=>$row[3],
                            "address"=>$row[4],
                            "phone"=>$row[5],
                            "note"=>$row[6]
                        ]);
                    }
                }
            }
        }
        $reader->close();
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
