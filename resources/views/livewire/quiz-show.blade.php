<div class="single-question-container">
    <h2 class="font-bold text-3xl text-center">{{ $quiz->name }}</h2>
    <hr>
    <div class="quiz-result flex gap-4 items-center justify-center mt-2">
        <span class="font-bold py-2 px-4">Total - {{ count($quiz->questions) }} </span>
        <span class="font-bold p-2">Correct Answer: {{ $correctAnswerCount }}</span>
        <span class="font-bold p-2">InCorrect Answer: {{ $incorrectAnswerCount }}</span>
    </div>
    @foreach ($quiz->questions as $question)
        <div
            class="single-question mb-2 border border-1 my-2 p-5
                @if (array_key_exists($question->id, $correct_answers)) {{ $correct_answers[$question->id] ? 'bg-green-300' : 'bg-red-300' }} @endif}}">

            <div class="single-question-title text-2xl font-bold">
                {{ $question->name }}
            </div>
            <div class="flex justify-between">
                <div class="single-question-content">
                    <input type="radio" id="answer_a-{{ $question->id }}"
                        wire:click="answerUpdate({{ $question->id }})" wire:model="answer" value="a,{{ $question->id }}"
                        wire:change.prevent="check" name="answer_a-{{ $question->id }}"
                        @if (array_key_exists($question->id, $correct_answers)) disabled @endif;>
                    <label for="answer_a-{{ $question->id }}">{{ $question->answer_a }}</label>
                </div>
                <div class="single-question-content">
                    <input type="radio" id="answer_b-{{ $question->id }}"
                        wire:click="answerUpdate({{ $question->id }})" wire:model="answer"
                        value="b,{{ $question->id }}" wire:change.prevent="check" name="answer_a-{{ $question->id }}"
                        @if (array_key_exists($question->id, $correct_answers)) disabled @endif;>
                    <label for="answer_b-{{ $question->id }}">{{ $question->answer_b }}</label>
                </div>
                <div class="single-question-content">
                    <input type="radio" id="answer_c-{{ $question->id }}"
                        wire:click="answerUpdate({{ $question->id }})" wire:model="answer"
                        value="c,{{ $question->id }}" wire:change.prevent="check" name="answer_a-{{ $question->id }}"
                        @if (array_key_exists($question->id, $correct_answers)) disabled @endif;>
                    <label for="answer_c-{{ $question->id }}">{{ $question->answer_c }}</label>
                </div>
                <div class="single-question-content">
                    <input type="radio" id="answer_d-{{ $question->id }}"
                        wire:click="answerUpdate({{ $question->id }})" wire:model="answer"
                        value="d,{{ $question->id }}" wire:change.prevent="check" name="answer_a-{{ $question->id }}"
                        @if (array_key_exists($question->id, $correct_answers)) disabled @endif;>
                    <label for="answer_d-{{ $question->id }}">{{ $question->answer_d }}</label>
                </div>
            </div>
        </div>
    @endforeach
</div>