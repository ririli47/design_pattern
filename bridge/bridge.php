<?php
interface WebPage
{
    public function __construct(Theme $theme);
    public function getContent();
}

class About implements WebPage
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return $this->theme->getColor() . "のAboutページ\n";
    }
}

class Careers implements WebPage
{
    protected $theme;

    public function __construct(Theme $theme)
    {
        $this->theme = $theme;
    }

    public function getContent()
    {
        return $this->theme->getColor() . "のCareersページ\n";
    }
}
interface Theme
{
    public function getColor();
}

class DarkTheme implements Theme
{
    public function getColor()
    {
        return "Dark Black";
    }
}

class LightTheme implements Theme
{
    public function getColor()
    {
        return "Light Black";
    }
}

class AquaTheme implements Theme
{
    public function getColor()
    {
        return "Aqua Black";
    }
}

$darkTheme = new DarkTheme();

$about = new About($darkTheme);
$careers = new Careers($darkTheme);

echo $about->getContent();
echo $careers->getContent();
