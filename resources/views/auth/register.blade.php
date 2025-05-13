<x-guest-layout>
    
    <input type="hidden" name="role" id="selectedRole" value="instructor">
    
    

    <form method="POST" action="{{ route('register') }}">
        @csrf


        <div class="flex justify-center mb-6">
            <button type="button" id="instructorTab"
                class="px-4 py-2 text-white border-b-2 border-transparent bg-gray-500 hover:border-gray-700 active-tab">
                Instructor
            </button>
            <button type="button" id="studentTab"
                class="px-4 py-2 text-gray border-b-2 border-transparent bg-white hover:border-gray-400">
                Student
            </button>
        </div>
        
        <input type="hidden" name ="role" value="admin" />
        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>

  
    <script>
        const instructorTab = document.getElementById('instructorTab');
        const studentTab = document.getElementById('studentTab');
        const selectedRole = document.getElementById('selectedRole');
    
        function activateTab(tabToActivate, tabToDeactivate, role) {
            tabToActivate.style.backgroundColor = '#3b82f6';
            tabToActivate.style.color = 'white';
            tabToDeactivate.style.backgroundColor = 'white';
            tabToDeactivate.style.color = 'gray';
            selectedRole.value = role;
            
        }
    
        instructorTab.addEventListener('click', () => {
            
            activateTab(instructorTab,studentTab, 'instructor');
        });
    
        studentTab.addEventListener('click', () => {
            activateTab(studentTab,instructorTab, 'student');
        });
    
        window.addEventListener('DOMContentLoaded', () => {
            instructorTab.style.backgroundColor = '#3b82f6';
            instructorTab.style.color = 'white';
        });
    </script>
    
    

</x-guest-layout>
