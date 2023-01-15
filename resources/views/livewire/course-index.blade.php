<div>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Price</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach ($courses as $course)
            <tr>
                <td class="border px-4 py-2">{{ $course->name }}</td>
                <td class="border px-4 py-2">{{ $course->price }}</td>
                <td class="border px-4 py-2 text-center">{{ date('F j, Y', strtotime($course->created_at)) }}</td>
                <td class="border px-4 py-2 text-center">
                    <div class="flex items-center justify-center">
                        <a href="{{ route('course.edit', $course->id) }}">
                            @include('components.icons.edit')
                        </a>
                        <a class="px-2" href="{{ route('course.show', $course->id) }}">
                            @include('components.icons.eye')
                        </a>
                        <form class="mt-2" onsubmit="return confirm('Are you sure Delete it?');" wire:submit.prevent="courseDelete({{$course->id}})" action="">
                            <button type="submit">
                                  @include('components.icons.delete')
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>

    <div class="mt-4">
        {{ $courses->links() }}
    </div>

</div>
