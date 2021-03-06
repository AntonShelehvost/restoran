<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 04.02.2017
 * Time: 12:28
 */

namespace App\Http\Controllers\Admin;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CategoryRequest as StoreRequest;
use App\Http\Requests\CategoryRequest as UpdateRequest;

class CategoryCrudController extends CrudController {

    public function __construct() {
        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\CategoryMenu");
        $this->crud->setRoute("admin/category");
        $this->crud->setEntityNameStrings('category', 'categories');

        /*
		|--------------------------------------------------------------------------
		| COLUMNS AND FIELDS
		|--------------------------------------------------------------------------
		*/

        $this->crud->allowAccess('reorder');
        $this->crud->enableReorder('name', 2);

        // ------ CRUD COLUMNS
        $this->crud->addColumn([
            'name' => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addColumn([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'pid',
            'entity' => 'parent',
            'attribute' => 'name',
            'model' => "App\Models\CategoryMenu",
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addField([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'pid',
            'entity' => 'parent',
            'attribute' => 'name',
            'model' => "App\Models\CategoryMenu",
        ]);

    }

    public function store(StoreRequest $request)
    {
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        return parent::updateCrud();
    }
}