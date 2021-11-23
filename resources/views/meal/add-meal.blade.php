<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Meal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:p-2 md:p-3 sm:w-11/12 md:w-11/12 lg:w-80 border bg-purple-100">
            <form action="{{ route('save-meal') }}" method="post">
                @csrf
                <label for="type">Meal Type</label><br>
                <select aria-label="Select a meal" id="type" name="type"
                    class="w-full mb-5 focus:outline-none border-none focus:border-none p-3 rounded-sm">
                    @foreach ($type as $key => $value)
                        <option value={{ $key }} class="w-full">{{ $value }}</option>
                    @endforeach
                </select><br>
                <label for="person_count">Total Person</label><br>
                <input type="number" name="person_count" placeholder="Total Person" id="person_count"
                    class="w-full mb-5 focus:outline-none border-none focus:border-none p-3 rounded-sm"><br>
                <label for="expense">Expense:</label><br>
                <input type="number" name="expense" placeholder="Today's Expense" id="expense"
                    class="w-full mb-5 focus:outline-none border-none focus:border-none p-3 rounded-sm"><br>
                <input type="submit" value="Add Meal" class="w-full bg-purple-600 p-3 text-white font-semibold">
            </form>
        </div>
    </div>
</x-app-layout>
