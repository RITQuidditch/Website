<?php

class RITQ_FAQEntry
{
    private $question;
    private $answer;

    public function __construct( $question, $answer )
    {
        $this->question = $question;
        $this->answer = $answer;
    }

    public function getQuestion()
    {
        return $this->question;
    }

    public function getAnswer()
    {
        return $this->answer;
    }

}

?>
