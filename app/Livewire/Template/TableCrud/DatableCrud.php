<?php

namespace App\Http\Livewire\Template\TableCrud;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\Inventory\Item;
use App\Models\Inventory\Inventory;
use App\Models\Inventory\Warehouse;
use App\Traits\DatatableCrud\DatatableCrudTrait;

class DatableCrud extends Component
{
    use WithPagination;
    use WithFileUploads;
    use DatatableCrudTrait;

    public $testmodel;

    protected $paginationTheme = 'bootstrap';

    protected $staticModel = Inventory::class;


    public function render()
    {
        debugbar()->info($this->selectedRow);

        return view('livewire.template.table-crud.datable-crud',[
            'tableList'=>$this->tableList]);
    }


    //QUERY FOR THE TABLE
    public function getTableListQueryProperty()
    {

        return $this->staticModel::query()->with('warehouse','item');
    }


    public function modelInitialize()
    {
        return $this->model = new $this->staticModel;
    }


    public function setConfiguration()
    {

        $this->table_type = 'table-gray'; // table-dashed | table-rounded  | table-blue

        $this->linkProfile = '/inventory/request-material/'; // /url-link/method/
        $this->addButtonLabel = 'Add';
        $this->searchLabel = 'Search'; //disable when '' (blank)

        $this->addRowType = 'inline'; //inline or new-page
        $this->massSelection = true; // enable disable checkbox
        $this->enableDeactivate = true; // model must have DeactivateTrait and deactivated_at column
        $this->actionButton = true; //cell action button

        $this->storeWithAttachment = true;
        $this->file_path = 'file';

        $this->setColumnHeader();

        $this->setDataTableColumn();

        $this->setRulesAndDefaultValues();

    }

    public function setColumnHeader()
    {
        $this->columnHeader = [
            'Storage',
            'Item',
            'Batch',
            'Unit Cost',
            'Stock on Hand',

        ];

        $this->columnWidth = [ //['width'=>'w-250px']
            'Storage' => ['width'=>'w-150px'],
            'Item' => ['width'=>'w-150px'],
            'Batch' => ['width'=>'w-150px'],
            'Unit Cost' => ['width'=>'w-200px'],
            'Stock on Hand' =>['width'=>'w-150px'],

        ];

        $this->columnHeaderShow = [
            'Storage'=> true,
            'Item'=>true,
            'Batch'=>true,
            'Unit Cost'=>true,
            'Stock on Hand'=>true,
        ];
    }

    public function setDataTableColumn()
    {
        //fetching column to display in datatable
        $this->rowField = [
            'warehouse_id',
            'item_id',
            'batch_number',
            'unit_cost',
            'stock_on_hand',
        ];

        //can add textbox to add and edit form
        $this->rowFieldAddEdit = [
            'warehouse_id',
            'item_id',
            'batch_number',
            'unit_cost',
            'stock_on_hand',
        ];

        $this->editAddInputType = [ //default: '' or textbox | date | display| select | disable | attachment
            'warehouse_id' => 'select',
            'item_id' => 'select',
            'batch_number'=> 'date',
            'unit_cost' => '',
            'stock_on_hand' => 'disable',

        ];

        //** BEGIN OPTION */
            //FROM custom selection
        $option = array(
            ['id'=>1,'display'=> 'one'],
            ['id'=>2,'display'=> 'two'],
            ['id'=>3,'display'=> 'three'],
        ); //  ['option'=> $option, 'displayField'=>'display'],

            //FROM eloquent
        $option =  Item::all()->toArray();
        // ['option'=> $option, 'displayField'=>'field_name_from_table'],

        $option2 = Warehouse::all()->toArray();

        //if editAddInputType=select
        $this->selectOption = [ //Item::all();
            'warehouse_id'=>['option'=> $option2, 'displayField'=>'warehouse_name','api'=> '/api-inventory/v1/warehouse' ],
            'item_id'=> ['option'=> $option, 'displayField'=>'item_name','api'=> '/api-inventory/v1/item'],
        ];
        //** END OPTION */
    }

    public function setRulesAndDefaultValues()
    {
        $this->setRules = [
            'warehouse_id' => 'required|numeric',
            'item_id'=>'required|numeric',
            'batch_number'=>'required',
            'unit_cost'=>'required |numeric',
            'stock_on_hand'=>'',

        ];

        $this->defaultAddValues = [ // you can add foreign id and default value
            'warehouse_id' => '',
            'item_id'=>'',
            'batch_number'=>'',
            'unit_cost'=>'',
            'stock_on_hand'=>'25',
        ];

    }


}
