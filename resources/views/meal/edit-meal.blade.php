<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Meal') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto sm:p-2 md:p-3 sm:w-11/12 md:w-11/12 lg:w-80 border bg-purple-100">
            <form action="{{route('update-meal', ['id'=>$meal->id])}}" method="post">
                @csrf
                @method('put')
                <label for="type">Meal Type</label><br>
                <select aria-label="Select a meal" id="type" value={{$meal->type}} name="type" class="w-full mb-5 focus:outline-none border-none focus:border-none p-3 rounded-sm">
                    @foreach ($type as $key=>$value)
                    <option value={{$key}} class="w-full">{{$value}}</option>
                    @endforeach
                </select><br>
                <input type="number" name="person_count" placeholder="Total Person" id="person_count"
                    class="w-full mb-5 focus:outline-none border-none focus:border-none p-3 rounded-sm"><br>
                <label for="expense">Expense:</label><br>
                <input type="number" name="expense" value={{$meal->expense}} placeholder="Today's Expense" id="expense" class="w-full mb-5 focus:outline-none border-none focus:border-none p-3 rounded-sm"><br>
                <input type="submit" value="Update Meal" class="w-full bg-purple-600 p-3 text-white font-semibold">
            </form>
        </div>
    </div>
</x-app-layout>
