<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Last {{ $day }} day Report
        </h2>
    </x-slot>

    <div class="py-12 container ">
        <div class="container flex justify-between items-center gap-4">
            <div class="bg-green-100 text-green-700 rounded-lg w-full px-3 py-2">
                <h4 class="text-3xl font-semibold">Snacks</h4>
                <p>Expense: {{ $expense_for_snacks }}</p>
                <p>Person: {{ $person_for_snacks }}</p>
            </div>
            <div class="bg-red-100 text-red-700 rounded-lg w-full px-3 py-2">
                <h4 class="text-3xl font-semibold">Lunch</h4>
                <p>Expense: {{ $expense_for_lunch }}</p>
                <p>Person: {{ $person_for_lunch }}</p>
            </div>
            <div class="bg-purple-100 text-purple-700 rounded-lg w-full px-3 py-2">
                <h4 class="text-3xl font-semibold">Party</h4>
                <p>Expense: {{ $expense_for_party }}</p>
                <p>Person: {{ $person_for_party }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
