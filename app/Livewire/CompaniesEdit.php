<?php

namespace App\Livewire;

use App\Livewire\Forms\CompanyForm;
use App\Models\Company;
use Livewire\Component;

class CompaniesEdit extends Component
{
    public function render()
    {
        return view('livewire.companies-create');
    }

    public function mount(Company $company): void
    {
        $this->form->setCompany($company);
    }

    public CompanyForm $form;

    public function save()
    {

        $this->validate();

        $this->form->update();
    }
}
