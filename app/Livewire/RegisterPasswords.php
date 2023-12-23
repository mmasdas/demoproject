<?php

namespace App\Livewire;

use Livewire\Component;
use ZxcvbnPhp\Zxcvbn;

class RegisterPasswords extends Component
{
    public string $password = '';

    public string $passwordConfirmation = '';

    public int $strengthScore = 0;

    public function updatedPassword($value)
    {
        $this->strengthScore = (new Zxcvbn())->passwordStrength($value)['score'];
    }

    public function render()
    {
        return view('livewire.register-passwords');
    }

    public function mount(): void
    {
    }

    public function generatePassword()
    {
        $this->setPasswords(random_strings());
    }

    public function setPasswords($value)
    {
        $this->password = $value;
        $this->passwordConfirmation = $value;
        $this->updatedPassword($value);
    }

    public array $strengthLevels = [
        1 => 'Weak',
        2 => 'Fair',
        3 => 'Good',
        4 => 'Strong',
    ];
}
