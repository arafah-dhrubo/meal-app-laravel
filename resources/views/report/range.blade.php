<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Range') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:p-2 md:p-3 sm:w-11/12 md:w-11/12 lg:w-80 border bg-purple-100">
            <form action="{{ route('dynamic') }}" method="POST">
                @csrf
                <label for="from">From Date</label><br>
                <input type="date" name="from_date" placeholder="From Date" id="from"
                    class="w-full mb-5 focus:outline-none border-none focus:border-none p-3 rounded-sm"><br>
                <label for="to">To Date</label><br>
                <input type="date" name="to_date" placeholder="to Date" id="to"
                    class="w-full mb-5 focus:outline-none border-none focus:border-none p-3 rounded-sm"><br>
                <input type="submit" value="Generate Report" class="w-full bg-purple-600 p-3 text-white font-semibold">
            </form>
        </div>
    </div>
</x-app-layout>
