<?php

namespace mikevandiepen\utility\Honeypot;

use mikevandiepen\utility\Honeypot\Traits\TimerInput;
use mikevandiepen\utility\Honeypot\Traits\HoneypotInput;
use mikevandiepen\utility\Honeypot\Traits\HoneypotWrapper;

class Honeypot
{
    use HoneypotInput;

    /**
     * Whether the submitting party is a Robot
     * @var bool
     */
    private $safetyRating = 0;

    /**
     * The minimum time a submission should take (In milliseconds)
     * @var bool
     */
    private $humanDuration = false;

    /**
     * The minimum time a submission should take (In milliseconds)
     * @var bool
     */
    private $robotDuration = false;

    /**
     * Whether the submitting party is a Human
     * @return integer
     */
    public function getSafetyRating() : int
    {
        return $this->safetyRating;
    }

    /**
     * Whether the submitting party is a Human
     * @return bool
     */
    public function isHuman() : bool
    {
        return (($this->safetyRating <= 100) && ($this->safetyRating >= 75));
    }

    /**
     * Whether the submitting party is a Robot
     * @return bool
     */
    public function isRobot() : bool
    {
        return (($this->safetyRating <= 0) && ($this->safetyRating >= 75));
    }

    /**
     * Minimum length of time a human should take to fill in the form and hit submit.
     * @param int $milliseconds
     *
     * @return Honeypot
     */
    public function minimumDurationHumans(int $milliseconds = 0) : self
    {
        $this->humanDuration = $milliseconds;

        return $this;
    }

    /**
     * Minimum length of time a robot would take to fill in the form and hit submit.
     * @param int $milliseconds
     *
     * @return Honeypot
     */
    public function minimumDurationRobots(int $milliseconds = 0) : self
    {
        $this->robotDuration = $milliseconds;

        return $this;
    }

    /**
     * Assess the safety rating of the submitter
     * @param int         $duration
     * @param string|null $field
     *
     * @return Honeypot
     */
    public function rateSubmission(int $duration = 0, string $field = null) : self
    {
        // Whether the duration of filling the form is greater or equal to the minimum submission time
        if ($duration <= $this->robotDuration) {
            $this->safetyRating = $this->safetyRating - 50;
        } elseif ($duration >= $this->humanDuration) {
            $this->safetyRating = $this->safetyRating + 50;
        }

        // Whether the field has been filled or is not null
        if (!empty(trim($field)) || $field != null) {
            $this->safetyRating = $this->safetyRating - 25;
        } elseif (empty(trim($field)) || $field = null) {
            $this->safetyRating = $this->safetyRating + 25;
        }

        // Applying both filters and bringing the score up to 100
        if (empty(trim($field)) && ($duration >= $this->humanDuration || $field = null)) {
            $this->safetyRating = $this->safetyRating + 25;
        }

        return $this;
    }

    /**
     * Generating the HTML for the field
     *
     * @return HoneypotInput
     */
    public function generateHTML(): string
    {
        $HTML = '<div class="HP__input_wrapper">' . "\n\r";
        $HTML .= "\t" . $this->generateDurationInput();
        $HTML .= "\t" . $this->generateHoneypotLabel();
        $HTML .= "\t" . $this->generateHoneypotInput();
        $HTML .= '</div>' . "\n\r";

        // Hide the wrapper and its contents
        $HTML .= '<script>document.getElementsByClassName("HP__input_wrapper").hidden = true;</script>' . "\n\r";

        return $HTML;
    }
}