<?php
namespace AuM\BlypoMarkdown\ViewHelper;

class Parse extends \AuM\Blypo\ViewHelper\ViewHelper
{
    public function render()
    {
        echo \Parsedown::instance()->text($this->arguments);
    }
}
