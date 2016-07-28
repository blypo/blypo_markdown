<?php
namespace AuM\BlypoParsedown\ViewHelper;

class Pd extends \AuM\Blypo\ViewHelper\ViewHelper
{
    public function render()
    {
        echo \Parsedown::instance()->text($this->arguments);
    }
}
