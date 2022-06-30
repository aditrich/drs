<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use App\Actions\Fortify\PasswordValidationRules;

class UserIndex extends Component
{
    use PasswordValidationRules;

    public $name;
    public $role;
    public $email;
    public $password;
    public $userId;
    public $password_confirmation;
    public $openCreateUser = false;
    public $confirmingUserDeletion = false;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'password' => $this->passwordRules(),
            'password_confirmation' => 'required'
        ];
    }

    // public function mount()
    // {
    //     $this->users = User::all();
    // }

    public function deleteUserConfirmation($userId)
    {
        $this->userId = $userId;
        $this->confirmingUserDeletion = true;
    }

    public function storeUser()
    {
        $this->validate();
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);
        $user->assignRole($this->role);
        $this->openCreateUser = false;
    }

    public function deleteUser()
    {
        User::find($this->userId)->delete();
        $this->confirmingUserDeletion = false;
        $this->dispatchBrowserEvent('success', 'The book has been removed successfully');
    }

    public function render()
    {
        return view('livewire.user.index', [
            'users' => User::all(),
            'roles' => Role::all()
        ]);
    }
}
