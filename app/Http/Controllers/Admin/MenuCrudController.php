<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 04.02.2017
 * Time: 16:24
 */


namespace App\Http\Controllers\Admin;
use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CategoryRequest as StoreRequest;
use App\Http\Requests\CategoryRequest as UpdateRequest;

class MenuCrudController extends CrudController {

    public function __construct() {
        parent::__construct();

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        $this->crud->setModel("App\Models\Menu");
        $this->crud->setRoute("admin/menu");
        $this->crud->setEntityNameStrings('menus', 'Menus');

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
            'label' => 'Category',
            'type' => 'select',
            'name' => 'category',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "App\Models\CategoryMenu",
        ]);
        $this->crud->addColumn([
            'name' => 'ingridient',
            'label' => 'Ingridient',
        ]);
        $this->crud->addColumn([
            'name' => 'price',
            'label' => 'Price',
        ]);
        $this->crud->addColumn([
            'name' => 'weight',
            'label' => 'Weight',
        ]);

        // ------ CRUD FIELDS
        $this->crud->addField([
            'name' => 'name',
            'label' => 'Name',
        ]);
        $this->crud->addField([
            'label' => 'Parent',
            'type' => 'select',
            'name' => 'category',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "App\Models\CategoryMenu",
        ]);
        $this->crud->addField([
            'name' => 'ingridient',
            'label' => 'Ingridient',
            'type' => 'textarea',
        ]);
        $this->crud->addField([
            'name' => 'price',
            'label' => 'Price',
            'type' => 'number',
        ]);
        $this->crud->addField([
            'name' => 'weight',
            'label' => 'Weight',
            'type' => 'number',
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