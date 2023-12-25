<?php

namespace App\Livewire\Forms;

use App\Models\Company;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CompanyForm extends Form
{
    #[Rule('required')]

    public string $name = '';

    public function save()
    {
        Company::create($this->all());

        $this->reset('name');
    }

    public function setCompany(Company $company)
    {
        $this->company = $company;

        $this->name = $company->name;
    }

    public function delete($id)
    {
        Company::findOrFail($id)->delete();
    }

    public ?Company $company;

    public function update()
    {
        $this->company->update($this->all());
    }
}
