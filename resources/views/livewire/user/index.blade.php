<section>
    <div>
        <div class="flex justify-between px-12 py-3">
            <span>Users List</span>
            <x-jet-button wire:click="$toggle('openCreateUser')">Add User</x-jet-button>
        </div>        
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div
                        class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        ID #</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Email</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Role</th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Created At</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($users as $user)
                                    <tr>
                                        <x-table.td>{{ $user->name }}</x-table.td>
                                        <x-table.td>000000</x-table.td>
                                        <x-table.td>{{ $user->email }}</x-table.td>
                                        @foreach ($user->roles as $role)      
                                            <x-table.td>{{ ucwords(str_replace(['-', '_'],' ', $role->name)) }}</x-table.td>
                                        @endforeach
                                        <x-table.td >{{ $user->created_at }}</x-table.td>
                                        <x-table.td>
                                            <x-button-link href="#">Edit</x-button-link>
                                            <x-button-link wire:click="deleteUserConfirmation({{ $user->id }})"  color="red">Delete</x-button-link>
                                        </x-table.td>
                                    </tr>                                 
                                @empty
                                    
                                @endforelse
        
                                <!-- More people... -->
                            </tbody>
                        </table
                        >
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Create user form modal --}}
    <x-jet-dialog-modal wire:model="openCreateUser">
        <x-slot name="title">
            Add User
        </x-slot>
        <x-slot name="content">
            <form id="newUser" wire:submit.prevent="storeUser">
                <x-form.input wire:model.lazy="name" name="name" label="Name"
                    :errors="$errors->first('name')" />
                <x-form.input wire:model.lazy="email" type="email" name="email"
                    label="Email" :errors="$errors->first('email')" />
                <x-form.select wire:model="role" name="role" field="name"
                    :options="$roles" label="Role" keyType="name"
                    :errors="$errors->first('role')" />
                <x-form.input wire:model.lazy="password" type="password" name="password"
                    label="Password" :errors="$errors->first('password')" />
                <x-form.input wire:model.lazy="password_confirmation" type="password" name="password_confirmation"
                    label="Confirm Password" :errors="$errors->first('password_confirmation')" />
            </form>
        </x-slot>

        <x-slot name="footer">
            <x-jet-button wire:click="$toggle('openCreateUser')" cancel="true" class="mr-4">
                Cancel
            </x-jet-button>
            <x-jet-button wire:click="storeUser">
                Submit
            </x-jet-button>
        </x-slot>
    </x-jet-dialog-modal>

    {{-- Delete user confirmation modal --}}
    <x-jet-confirmation-modal wire:model="confirmingUserDeletion">
        <x-slot name="title">
            Delete Account
        </x-slot>
    
        <x-slot name="content">
            Are you sure you want to delete this account? Once this account is
            deleted, all of its resources and data will be permanently deleted.
        </x-slot>
    
        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')"
                wire:loading.attr="disabled">
                Nevermind
            </x-jet-secondary-button>
    
            <x-jet-danger-button class="ml-2" wire:click="deleteUser"
                wire:loading.attr="disabled">
                Delete Account
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</section>
