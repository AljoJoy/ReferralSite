<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    @if ($isAdmin === 1)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-center">
                    <h1 class="text-gray-400 dark:text-white text-center text-3xl">Points Table</h1>
                    <table class="table-auto">
                        <thead>
                            <tr>
                                <th class="border border-slate-600">User Name</th>
                                <th class="border border-slate-600">Points</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $refer)
                            <tr>
                                <td class="border border-slate-600 text-center">{{optional($refer->user)->name}}</td>
                                <td class="border border-slate-600 text-center">{{optional($refer)->points}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                    <div p-6 text-gray-900 dark:text-gray-100>your referral code is {{$data}}</div>
                    <div p-6 text-gray-900 dark:text-gray-100>your referral link is {{ url('/') ."/".$data}}</div>
                </div>
            </div>
        </div>
    </div>
    @endif

</x-app-layout>