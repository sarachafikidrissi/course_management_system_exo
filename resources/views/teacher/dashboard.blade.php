<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Courses Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    @if (Auth::user()->approved || Auth::user()->roles[0]->name == 'student')
                        @role('teacher')
                            @include('components.course_modal')
                        @endrole

                        <div class="grid grid-cols-3 gap-2">
                            @foreach ($courses as $course)
                                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Strait">
                                <div class="max-w-sm rounded overflow-hidden shadow-lg mt-4"
                                    style="font-family: 'Strait', sans-serif;">
                                    <img class="w-full h-[300px]" src="{{ asset('storage/' . $course->image) }}"
                                        alt="Sunset in the mountains">
                                    <div class="px-6 py-4">
                                        <div class="font-bold text-xl mb-2">{{ $course->title }}</div>
                                        <p class="text-gray-700 text-base">
                                            {{ $course->description }}
                                        </p>
                                        <div>
                                            <span class="px-2 rounded-full bg-green-300">{{ $course->module }}</span>
                                            <span
                                                class="px-2 rounded-full bg-green-600">{{ $course->user->name }}</span>
                                        </div>
                                        <br>
                                        @if (Auth::user()->id == $course->user_id)
                                            <div class="flex items-center gap-x-5 mt-4">
                                                <a target="_blank" href="https://bootsnipp.com/muhittinbudak"
                                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1.5 px-4 border border-blue-700 rounded">
                                                    update
                                                </a>
                                                <button class="px-4 py-1.5 bg-red-500 rounded-md">Delete</button>
                                            </div>
                                        @elseif (Auth::user()->roles[0]->name === 'student')
                                            <form action="/course/enrollement" method="post">
                                                @csrf
                                                <input type="text" class="hidden" name="course_id"
                                                    value="{{ $course->id }}">
                                                {{-- @if (Auth::user()->userCourses->id->exists()) --}}
                                                        <button
                                                            class="px-6 py-1.5 bg-yellow-500 rounded-md " >Enrolle</button>
                                                {{-- @endif --}}
                                            </form>
                                        @endif



                                    </div>

                                </div>
                            @endforeach
                        </div>
                    @else
                        <h1>you are not approved yet</h1>
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
