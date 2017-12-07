<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\MenuRequest as StoreRequest;
use App\Http\Requests\MenuRequest as UpdateRequest;
use Illuminate\Support\Facades\Storage;
use Box\Spout\Reader;
use Box\Spout\Writer;
use Box\Spout\Common\Type;
use Illuminate\Support\Facades\DB;
use Box\Spout\Writer\Style\StyleBuilder;

class MenuCrudController extends CrudController
{
    public function setup()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Menu');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/menu');
        $this->crud->setEntityNameStrings('menu', 'menus');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

//        $this->crud->setFromDb();
        $this->crud->setListView("backpack::crud.list_foods");

        // ------ CRUD FIELDS
        // $this->crud->addField($options, 'update/create/both');
         $this->crud->addFields([
             ['name' => 'name', // The db column name
                 'label' => 'Name', // Table column heading
                 'type' => 'text'],
             ['name' => 'price', // The db column name
                 'label' => 'Price', // Table column heading
                 'type' => 'text'],
             ['name' => 'promotion_price', // The db column name
                 'label' => 'Promotion Price', // Table column heading
                 'type' => 'text'],
             ['name' => 'detail', // The db column name
                 'label' => 'Detail', // Table column heading
                 'type' => 'text'],
             ['name' => 'image', // The db column name
                 'label' => 'Image',
                 'type' => 'image',
                 'upload' => true,
                 'crop' => true, // set to true to allow cropping, false to disable
                 'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
                 'prefix' => 'images/thuc_don/'
             ] // in case you only store the filename in the database, this text will be prepended to the database value],
         ], 'update/create/both');
        // $this->crud->removeField('name', 'update/create/both');
        // $this->crud->removeFields($array_of_names, 'update/create/both');

        // ------ CRUD COLUMNS
        // $this->crud->addColumn(); // add a single column, at the end of the stack
         $this->crud->addColumns([
             ['name' => 'id', // The db column name
                 'label' => 'ID', // Table column heading
                 'type' => 'text'],
             ['name' => 'name', // The db column name
                 'label' => 'Name', // Table column heading
                 'type' => 'text'],
             ['name' => 'price', // The db column name
                 'label' => 'Price', // Table column heading
                 'type' => 'text'],
             ['name' => 'promotion_price', // The db column name
                 'label' => 'Promotion Price', // Table column heading
                 'type' => 'text'],
             ['name' => 'detail', // The db column name
                 'label' => 'Detail', // Table column heading
                 'type' => 'text'],
             ['name' => 'image', // The db column name
                 'label' => 'Image', // Table column heading
                 'type' => 'image',
                 'prefix' =>'images/thuc_don/',
                 'height'=>'100px',
                 'width'=>'100px',
             ],
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

    public function ExportExcelAction()
    {
        $customer = DB::table("menu")->get();

        $table_title = ['id','name','price','promotion_price','detail','image'];

        $oExcel =  Writer\WriterFactory::create(Type::XLSX); // for XLSX files
        $oExcel->openToBrowser("menu.xlsx");

        $oExcel->addRowWithStyle($table_title,(new StyleBuilder())->setFontBold()->setFontSize(14)->build());
        foreach ($customer as $sheet){
            $oExcel->addRow(get_object_vars($sheet));
        }
        $oExcel->close();
    }

    public function ImportExcelAction(){
        if(isset($_FILES['excelFile']))
        {
            $target_file = basename($_FILES["excelFile"]["name"]);
            $des_file = 'uploads/' . basename($_FILES["excelFile"]["name"]);
            $excelFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            $title = ['id','name','price','promotion_price','detail','image'];
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
                    if(gettype($row[2])!="integer" || gettype($row[3])!="integer"){
                        $reader->close();
                        unlink($file_name);
                        return redirect()->back()->with("error","False Value Type");
                    }
                    $count_id = DB::table("menu")->where("id",$row[0])->count();
                    if($count_id>0){
                        //Update
                        DB::table("menu")->where("id",$row[0])->update([
                            "name"=>$row[1],
                            "price"=>$row[2],
                            "promotion_price"=>$row[3],
                            "detail"=>$row[4],
                            "image"=>$row[5]
                        ]);
                    }else{
                        //Insert
                        DB::table('menu')->insert([
                            "id"=>$row[0],
                            "name"=>$row[1],
                            "price"=>$row[2],
                            "promotion_price"=>$row[3],
                            "detail"=>$row[4],
                            "image"=>$row[5]
                        ]);
                    }
                }
            }
        }
        $reader->close();
    }

public function edit($id)
{
    $image = DB::table("menu")->select("image")->where("id",$id)->get();

    return parent::edit($id); // TODO: Change the autogenerated stub
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
        $image = DB::table("menu")->select("image")->where("id",$request->input("id"))->get();
        Storage::disk("public")->delete("images/thuc_don/".$image[0]->image);
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
