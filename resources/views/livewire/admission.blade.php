<div>
    <form wire:submit.prevent="search" class="flex items-center mb-4">
        <input type="text" wire:model.leazy='search' class="lms-input" placeholder="Search" required>
        <div class="ml-4"><button type="submit" class="lms-btn">Search</button></div>
    </form>

    @if (count($leads) > 0)
    <form wire:submit.prevent="admit">
        <div class="mb-4">
            <select wire:model.lezy="lead_id" class="lms-input">
                <option value="">Select lead</option>
                @foreach ($leads as $lead)
                    <option value="{{ $lead->id }}">{{ $lead->name }} - {{ $lead->phone }}</option>
                @endforeach
            </select>
        </div>

        @if (!empty($lead_id))
        <div class="mb-4">
            <select wire:change="courseSelected" wire:model.lay="course_id" class="lms-input">
                <option value="">Select course</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        @endif

        @if (!empty($selectedCourse))
            <p>Price: ${{ number_format($selectedCourse->price, 2) }}</p>

            {{-- <div class="mb-4 mt-2">
                <input type="number" wire:model.leazy='payment' step=".01" class="lms-input" placeholder="Payment now">
            </div> --}}

            @include('components.wire-loading-btn')
        @endif
    </form>
    @endif

    {{-- <h2>Found {{ count($leads) }} items</h2> --}}
</div>
