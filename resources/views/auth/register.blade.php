<x-layout>
    <x-slot:heading>
        Registration
    </x-slot:heading>

    <form method="POST" action="/register">
        @csrf 
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-6 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="name">Full name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="name" id="name" placeholder="Input your full name..."></x-form-input>
                            <x-form-error name="name"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="name">Age</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="age" id="age" placeholder="Input your age..."></x-form-input>
                            <x-form-error name="age"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" placeholder="Input your email..." type="email"></x-form-input>
                            <x-form-error name="email"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password" id="password" placeholder="Input your password..." type="password"></x-form-input>
                            <x-form-error name="password"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password_confirmation">Confirm the password</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="password_confirmation" id="password_confirmation" placeholder="Confirm your password..." type="password"></x-form-input>
                            <x-form-error name="password_confirmation"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
            <x-form-button>Register</x-form-button>
        </div>
    </form>
</x-layout>
