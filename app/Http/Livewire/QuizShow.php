<?php

namespace App\Http\Livewire;

use App\Models\Question;
use Livewire\Component;

class QuizShow extends Component
{
    public $quiz;
    public $answer;
    public $answer_id;
    public $correctAnswerCount = 0;
    public $incorrectAnswerCount = 0;
    public $correct_answers = [];

    public function render()
    {
        return view('livewire.quiz-show');
    }

    public function answerUpdate($id) {
        $this->answer_id = $id;
    }

    public function check() {

        $question = Question::select('correct_answer')->findOrFail($this->answer_id);
        //  dd($question);

        $selectedAnswer = explode(',', $this->answer)[0];

        if($question->correct_answer == $selectedAnswer) {
            flash()->addSuccess("Correct answer");
            $this->correctAnswerCount++;
            $this->correct_answers[$this->answer_id] = true;
        } else {
            flash()->addError('Incorrect answer');
            $this->incorrectAnswerCount++;
            $this->correct_answers[$this->answer_id] = false;
        }


    }


}