<x-layout>
    <x-slot:heading>
        Contact
    </x-slot:heading>

    <h1>Contact us!</h1>

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="mt-6 grid grid-cols-1 gap-x-6 sm:grid-cols-6">
                    <x-form-field>
                        <x-form-label for="name">Your name</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="name" id="name" placeholder="Input your name..." required></x-form-input>
                            <x-form-error name="name"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="email">Your email</x-form-label>
                        <div class="mt-2">
                            <x-form-input name="email" id="email" type="email" placeholder="Input your email..." required></x-form-input>
                            <x-form-error name="email"></x-form-error>
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="message">Message</x-form-label>
                        <div class="mt-2">
                            <textarea name="message" id="message" rows="4" class="block pl-3 w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6" placeholder="Input your message..." required></textarea>
                            <x-form-error name="message"></x-form-error>
                        </div>
                    </x-form-field>
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Submit</button>
        </div>
    </form>
</x-layout>