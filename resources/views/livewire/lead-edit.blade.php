<form wire:submit.prevent="submitForm">
    <div class="mb-4">
        <label for="" class="lms-label">Name</label>
        <input type="text" class="lms-input" value="{{ $lead->name }}">
    </div>
</form>
