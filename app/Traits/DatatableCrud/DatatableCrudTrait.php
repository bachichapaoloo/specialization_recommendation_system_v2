<?php

namespace App\Traits\DatatableCrud;

use App\Services\Template\DatatableUploadService;

trait DatatableCrudTrait {

    public $model;
    public $columnHeader = [];
    public $rowField = [];
    public $setRules = [];
    public $editRules;
    public $defaultAddValues = [];
    public $perPage = 10;
    public $search = '';
    public $addButtonLabel;
    public $searchLabel;
    public $massSelection;
    public $enableDeactivate;
    public $totalDeactivated = 0;
    public $showDeactivate = false;
    public $linkProfile = '';
    public $selectedRow = [];
    public $selectAll = false;
    public $selectPage = false;
    public $showModal = false;
    public $rowFieldAddEdit = [];
    public $table_type = [];
    public $actionButton;
    public $table_theme;
    public $file_path;

    // for inline edit and inline adding
    public $newRows = [];
    public $displayAddRow = false;
    public $editedRowIndex;
    public $addRowType = 'inline'; // inline or new-page
    public $storeWithAttachment;
    public $columnWidth = [];
    public $columnHeaderShow = [];
    public $editAddInputType = [];
    public $selectOption = [];

    public function getTableListCount()
    {
        return $this->tableListQuery->count();
    }

    public function getTableListProperty()
    {
        $this->setConfiguration();

        $this->setDeactivateList();
        if (!$this->enableDeactivate) {
            return $this->tableListQuery->paginate($this->perPage);
        } else {
            if (!$this->showDeactivate) {
                return $this->tableListQuery->onlyActivated()->paginate($this->perPage);
            } else {
                return $this->tableListQuery->onlyDeactivated()->paginate($this->perPage);
            }
        }
    }

    public function displayDeactivate()
    {
        $this->showDeactivate = true;
    }

    public function displayActivate()
    {
        $this->showDeactivate = false;
    }

    public function setDeactivateList()
    {
        if ($this->enableDeactivate) {
            $this->totalDeactivated = $this->staticModel::countDeactivated();
        }
    }

    public function resetBulk()
    {
        $this->selectedRow = [];
        $this->selectPage = false;
        $this->selectAll = false;
    }

    // DELETE ROW WHEN SELECTED
    public function massDelete()
    {
        foreach ($this->selectedRow as $id) {
            $this->modelInitialize();
            $this->model->find($id)->delete();
        }
        $this->resetBulk();

        session()->flash('message', 'Selected records were deleted successfully.');
        $this->dispatch('alert_remove');
    }

    public function isSelected($id)
    {
        return (in_array($id, $this->selectedRow)) ? true : false;
    }

    public function updatedSelectPage($value)
    {
        if ($value) {
            $this->selectedRow = $this->tableList->pluck('id')->map(fn($item) => (string) $item)->toArray(); // from collection to string and collected into array
        } else {
            $this->selectedRow = [];
        }
    }

    public function massChangeRows($id)
    {
        $update = [
            'schedule_id' => $id
        ];

        $this->modelInitialize();
        $this->model->whereIn('id', $this->selectedRow)->update($update);

        session()->flash('message', 'Successfully change schedule');
    }

    public function updatedSelectedRow()
    {
        $this->selectPage = false;
    }

    public function selectAllRecord()
    {
        $this->selectAll = true;
        $this->selectedRow = $this->tableListQuery->pluck('id')->map(fn($item) => (string) $item)->toArray();
    }

    public function updatedSearch()
    {
        $this->selectPage = false;
    }

    // inline edit and inline add
    public function edit($index)
    {
        $this->modelInitialize();
        $this->model = $this->model->find($index);

        $this->editedRowIndex = $index;
    }

    public function cancel()
    {
        $this->editedRowIndex = null;
    }

    public function update($index)
    {
        $validate = $this->validate(
            $this->rules(),
            $this->updateMessages(),
            $this->updateAttributes()
        );

        $this->model->save();
        $this->editedRowIndex = null;

        session()->flash('message', 'Successfully Updated!');
        $this->dispatch('alert_remove');
    }

    // must be declared to display on blade
    // update rules
    public function rules()
    {
        $rule = [];

        foreach ($this->setRules as $key => $value) {
            $rule['model.' . $key] = $value;
        }

        return $rule;
    }

    public function updateMessages()
    {
        return [];
    }

    public function updateAttributes()
    {
        $attr = [];
        foreach ($this->rowField as $key => $value) {
            $attr['model.' . $value] = $this->columnHeader[$key];
        }

        return $attr;
    }

    // DELETE IN BUTTON CLICK
    public function delete($id)
    {
        $this->modelInitialize();
        $this->model->find($id)->delete();

        session()->flash('message', 'Successfully deleted');
        $this->dispatch('alert_remove');
    }

    // DELETE IN BUTTON CLICK
    public function deactivate($id)
    {
        $this->modelInitialize();
        $this->model->find($id)->deactivate();

        session()->flash('message', 'Successfully Deactivated');
        $this->dispatch('alert_remove');
    }

    public function activate($id)
    {
        $this->modelInitialize();
        $this->model->find($id)->activate();

        session()->flash('message', 'Successfully Activated');
        $this->showDeactivate = false;
        $this->dispatch('alert_remove');
    }

    // INLINE ADD RECORD
    public function store()
    {
        $valid = $this->validate(
            $this->storeRules(),
            $this->storeMessages(),
            $this->validationAttributes(),
        );

        $this->checkIfStoreWithAttachment();

        $this->modelInitialize();
        $this->model->insert($this->newRows);
        $this->newRows = [];

        session()->flash('message', 'Successfully Added!');
        $this->dispatch('alert_remove');
    }

    public function storeRules()
    {
        $rule = [];

        foreach ($this->setRules as $key => $value) {
            $rule['newRows.*.' . $key] = $value;
        }

        return $rule;
    }

    public function storeMessages()
    {
        return [];
    }

    public function validationAttributes()
    {
        $attr = [];
        foreach ($this->rowField as $key => $value) {
            $attr['newRows.*.' . $value] = $this->columnHeader[$key];
        }
        return $attr;
    }

    public function addRow()
    {
        $rows = [];
        foreach ($this->defaultAddValues as $key => $value) {
            $rows[$key] = $value;
        }
        $this->newRows[] = $rows;

        $this->editedRowIndex = null;
        $this->dispatch('selecting2');
    }

    public function remove($index)
    {
        unset($this->newRows[$index]);
        $this->newRows = array_values($this->newRows);
    }

    public function cancelNewRows()
    {
        $this->newRows = [];
    }

    public function checkIfStoreWithAttachment()
    {
        if ($this->storeWithAttachment) {
            foreach ($this->newRows as $key => $value) {
                foreach ($this->rowField as $row) {
                    if ($this->editAddInputType[$row] == 'attachment') {
                        $this->newRows[$key][$row] = $this->upload($value[$row]);
                    }
                }
            }
        }
    }

    public function export($filename)
    {
        $download = (new DatatableUploadService())->set($this->file_path);
        return $download->download($filename);
    }

    public function upload($filename)
    {
        return (new DatatableUploadService())->set($this->file_path)->upload($filename);
    }

    public function deleteAttachment($filename)
    {
        $file = (new DatatableUploadService())->set($this->file_path);
        $file->delete($filename);
    }
}
