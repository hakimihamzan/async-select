<?php

namespace App\Livewire;

use App\Models\Location;
use App\Models\Project;
use App\Models\Reader;
use Livewire\Component;

class SearchDropdown extends Component
{
    public $search = '';
    public $placeHolderName = '';
    public $placeHolderId = '';
    public $model;
    public $inputName;
    public $inputId;
    public $selected;
    public $showDropdown = false;

    public function mount()
    {
        $this->inputName = $this->model . '_name';
        $this->inputId = $this->model . '_id';
    }

    public function render()
    {
        $results = [];

        $this->populateSearch();

        if ($this->search == '') {
            $results = $this->model::limit(5)->get();
        } elseif (strlen($this->search) >= 2) {
            $results = $this->model::where('name', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.search-dropdown', [
            'results' => $results
        ]);
    }

    public function setInput($id, $name)
    {
        $this->placeHolderName = $name;
        $this->placeHolderId = $id;
        $this->selected = $id;
        $this->showDropdown = false;
    }

    public function removeInput()
    {
        $this->placeHolderName = '';
        $this->placeHolderId = '';
        $this->selected = '';
        $this->showDropdown = false;
    }

    private function populateSearch()
    {
        switch ($this->model) {
            case 'reader':
                $this->model = get_class(new Reader);
                break;

            case 'project':
                $this->model = Project::class;
                break;

            case str_contains($this->model, 'location'):
                $this->model = Location::class;
                break;

            default:
                # code...
                break;
        }
    }
}
