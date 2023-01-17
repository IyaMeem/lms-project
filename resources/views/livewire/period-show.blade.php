<div class="mx-auto p-4 text-gray-800">
    <h1 class="font-bold mb-2 underline">{{ $period->course->name }}</h1>
    <p class="mb-4 italic">Price: ${{ $period->course->price }}</p>
    <p class="pb-6">{{ $period->course->description }}</p>

    <h2 class="font-bold mb-2">Classes</h2>
    <table class="w-full table-auto">
        <tr>
            <th class="border px-4 py-2 text-left">Name</th>
            <th class="border px-4 py-2 text-left">Email</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>

        @foreach ($period->course->students as $student)
        <tr>
            <th class="px-4 py-2 border text-left font-normal">{{ $student->name }}</th>
            <th class="px-4 py-2 border text-left font-normal">{{ $student->email }}</th>
            <th class="border px-4 py-2 text-center">
                <h2>Test</h2>
            </th>
        </tr>
        @endforeach
    </table>

    <div class="mt-4">
        <h2 class="font-bold mb-2">Notes</h2>
    </div>

    <div class="mt-4">
        <p class="font-bold mb-2">Add new note</p>
    </div>
 </div>


