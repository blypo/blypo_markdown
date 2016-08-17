<?php
namespace AuM\BlypoMarkdown\Helper;

class TocHelper
{

    public static function injectToc($html)
    {
        if (strpos($html, '[TOC]') < 0) {
            return $html;
        }

        $markupFixer  = new \TOC\MarkupFixer();
        $tocGenerator = new \TOC\TocGenerator();

        $html  = $markupFixer->fix($html);
        $toc = "<div class='toc'><ul>" . $tocGenerator->getHtmlMenu($html, 2, 4) . "</ul></div>";

        echo str_replace('[TOC]', $toc, $html);
    }
}
