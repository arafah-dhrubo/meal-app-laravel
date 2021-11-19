<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full whitespace-no-wrap">
                        <thead>
                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Sl no.</th>
                                <th class="px-4 py-3">Added By</th>
                                <th class="px-4 py-3">Expense</th>
                                <th class="px-4 py-3">Meal Type</th>
                                <th class="px-4 py-3">Person Count</th>
                                <th class="px-4 py-3">Date Added</th>
                                <th class="px-4 py-3">Date Updated</th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($meals as $item => $value)
                                <tr class="text-gray-700 dark:text-gray-400">
                                    <td class="pl-4">{{$item+1}}</td>
                                    <td class="px-4 py-3">
                                        <div class="flex items-center text-sm">
                                            <!-- Avatar with inset shadow -->
                                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                                <img class="object-cover w-full h-full rounded-full"
                                                    src="{{ $value->user->profile_photo_url }}"
                                                    alt="{{ Auth::user()->name }}" loading="lazy" />
                                                <div class="absolute inset-0 rounded-full shadow-inner"
                                                    aria-hidden="true"></div>
                                            </div>
                                            <div>
                                                <p class="font-semibold">{{ $value->user->name }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        BDT {{ $value->expense }}
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        @if ($value->type == 'snacks')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ $value->type }}
                                            </span>

                                        @elseif ($value->type == 'lunch')
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ $value->type }}
                                            </span>

                                        @else
                                            <span
                                                class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                                {{ $value->type }}
                                            </span>

                                        @endif
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $value->person_count }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        {{ $value->created_at->diffForHumans() }}
                                    </td>
                                    <td class="px-4 py-3 text-sm">
                                        @if ($value->updated_at)
                                            {{ $value->updated_at->diffForHumans() }}
                                        @else
                                            <p class="text-red-600">Not Updated Yet</p>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('edit-meal', ['id'=>$value->id])}}" class="bg-purple-500 text-white px-3 py-2 rounded-full">Update</a>
                                        <a href="{{route('delete-meal', ['id'=>$value->id])}}" class="bg-red-500 text-white px-3 py-2 rounded-full">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div>
                    {{ $meals->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
