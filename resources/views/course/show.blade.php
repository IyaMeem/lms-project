<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Course') }}
            </h2>

            {{-- <a class="lms-btn" href="{{ route('course.index') }}">back</a> --}}
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- component -->
                <div class="mx-auto p-4 text-gray-800">
                    <h1 class="font-bold mb-2 underline">{{ $course->name }}</h1>
                    <p class="mb-4 italic">Price: ${{ $course->price }}</p>
                    <p class="pb-6">{{ $course->description }}</p>

                    <h2 class="font-bold mb-2">Classes</h2>
                    <table class="w-full table-auto">
                        <tr>
                            <th class="border px-4 py-2 text-left">Name</th>
                            <th class="border px-4 py-2 text-left">Actions</th>
                        </tr>

                        @foreach ($course->periods as $class)
                        <tr>
                            <th class="px-4 py-2 border text-left font-normal">{{ $class->name }}</th>
                            <th class="border px-4 py-2 text-center">
                                <div class="flex items-center justify-center">
                                    <a href="{{ route('class.edit', $class->id) }}">
                                        @include('components.icons.edit')
                                    </a>
                                    <a class="px-2" href="{{ route('class.show', $class->id) }}">
                                        @include('components.icons.eye')
                                    </a>
                                    <form class="mt-2" onsubmit="return confirm('Are you sure Delete it?');" wire:submit.prevent="classDelete({{$class->id}})" action="">
                                        <button type="submit">
                                              @include('components.icons.delete')
                                        </button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                        @endforeach
                    </table>
                </div>

               {{-- <livewire:course-show :course_id="$id" /> --}}
            </div>
        </div>
    </div>
</x-app-layout>