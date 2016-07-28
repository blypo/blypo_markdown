<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, "Configuration/TypoScript/", "Blypo Parsedown");

// Add page TSConfig
$pageTsConfig = \TYPO3\CMS\Core\Utility\GeneralUtility::getUrl(\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath($_EXTKEY) . 'Configuration/TSConfig/tsconfig.txt');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig($pageTsConfig);

$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
$iconRegistry->registerIcon('content-special-markdown', \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class, array(
    'source' => 'EXT:blypo_parsedown/Resources/Public/Icons/content-special-markdown.svg'
));

// Adds the content element to the "Type" dropdown
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
   array(
      'Markdown',
      'blypoparsedown_newcontentelement',
      \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($_EXTKEY)
         . 'Resources/Public/Icons/content-special-markdown.svg'
   ),
   'CType'
);

$GLOBALS['TCA']['tt_content']['types']['blypoparsedown_newcontentelement'] = array(
   'showitem' => '
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.general;general,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.header;header,bodytext,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.appearance,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.frames;frames,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.access,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.visibility;visibility,
         --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:palette.access;access,
      --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xml:tabs.extended
	',
);

$GLOBALS['TCA']['tt_content']['types']['blypoparsedown_newcontentelement']['columnsOverrides'] = array(
    'bodytext' => array(
        'config' => array(
            'type' => 'text',
            'rows' => 42,
        )
    )
);
