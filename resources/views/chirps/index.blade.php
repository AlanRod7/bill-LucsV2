<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Chirps') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="" method="post" placeholder="{{__('What\'s on your mind?')}}">
                        @csrf
                        <textarea class="bg-transparent block w-full rounded-md border-gray-300 bg-white focus:ring-opacity-50 dark:border-gray-600 dark:bg-gray-800 dark:text-white dark:focus:border-indigo-300 dark:focus:ring dark:focus:ring-indigo-200 dark:focus:ring-opacity-50" name="message" id="" cols="5" rows="5">

                        </textarea>
                        <x-primary-button class="mt-4" >Shirp </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
