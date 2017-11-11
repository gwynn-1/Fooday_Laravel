<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CustomerRequest as StoreRequest;
use App\Http\Requests\CustomerRequest as UpdateRequest;

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
        // $this->crud->addButtonFromModelFunction($stack, $name, $model_function_name, $position); // add a button whose HTML is returned by a method in the CRUD model
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
