<?php

namespace App\Livewire;

use App\Livewire\Forms\CompanyForm;
use App\Models\Company;
use Livewire\Component;

class CompaniesList extends Component
{
    public function render()
    {
        $companies = Company::all();

        return view('livewire.companies-list', compact('companies'));
    }

    public function mount(): void
    {
    }

    public function delete($id)
    {
        $this->form->delete($id);
    }

    public CompanyForm $form;
}
