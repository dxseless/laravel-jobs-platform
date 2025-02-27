<x-layout>
    <x-slot:heading>
        Registration
    </x-slot:heading>

    <form method="POST" action="/jobs/create">
        @csrf 
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-6 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="title">First name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="first_name" id="first_name" placeholder="Input your first name..."></x-form-input>
                            <x-form-error name="first_name"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="title">Last name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="last_name" id="last_name" placeholder="Input your last name..."></x-form-input>
                            <x-form-error name="last_name"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="location">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" placeholder="Input your email..." type="email"></x-form-input>
                            <x-form-error name="email"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="title">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" placeholder="Input your password..." type="password"></x-form-input>
                            <x-form-error name="password"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="tags">Confirm the password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" placeholder="Confirm your password..."></x-form-input>
                            <x-form-error name="password_confirmation"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button>Save</x-form-button>
        </div>
    </form>
</x-layout>
