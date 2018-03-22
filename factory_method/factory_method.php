<?php

interface Interviewer
{
    public function askQuestions();
}

class Developer implements Interviewer
{
    public function askQuestions()
    {
        echo "デザインパターンについて尋ねる";
    }
}

class CommunityExecutive implements Interviewer
{
    public function askQuestions()
    {
        echo "コミュニティ育成について尋ねる";
    }
}

abstract class HiringManager
{
    // Factory method
    abstract protected function makeInterviewer(): Interviewer;

    public function takeInterview()
    {
        $interviewer = $this->makeInterviewer();
        $interviewer->askQuestions();
    }
}

class DevelopmentManager extends HiringManager
{
    protected function makeInterviewer(): Interviewer
    {
        return new Developer();
    }
}

class MarketingManager extends HiringManager
{
    protected function makeInterviewer(): Interviewer
    {
        return new CommunityExecutive();
    }
}

$devManager = new DevelopmentManager();
$devManager->takeInterview();

$marketingManager = new MarketingManager();
$marketingManager->takeInterview();
