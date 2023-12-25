<?php

namespace App\Livewire;

use App\Models\Company;
use Livewire\Component;

class CompanyUserList extends Component
{
    public function render()
    {
        $users = $this->company->users()->get();

        return view('livewire.company-user-list', compact('users'));
    }

    public function mount(Company $company): void
    {
        $this->company = $company;
    }

    public Company $company;
}
