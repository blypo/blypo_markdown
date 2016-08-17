<div class="markdown">

<?php

    $text = $data['bodytext'];

    if (substr($text, 0, 4) === 'EXT:') {
        $filename = $text;
        $text = file_get_contents(__DIR__.'/../../typo3conf/ext/'.trim(substr($filename, 4)));
        $text .= '  '.PHP_EOL.'---   '.PHP_EOL.'_Page generated from ['.basename(substr($filename, 4)).'](/typo3conf/ext/'.trim(substr($filename, 4)).')_';
    }

    $html = \Parsedown::instance()->text($text);
    echo \AuM\BlypoMarkdown\Helper\TocHelper::injectToc($html);

?>

</div>
