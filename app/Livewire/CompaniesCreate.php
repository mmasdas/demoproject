<?php

namespace App\Livewire;

use App\Livewire\Forms\CompanyForm;
use Livewire\Component;

class CompaniesCreate extends Component
{
    public function render()
    {
        return view('livewire.companies-create');
    }

    public function mount(): void
    {
    }

    public CompanyForm $form;

    public function save()
    {
        $this->validate();

        $this->form->save();
    }
}
