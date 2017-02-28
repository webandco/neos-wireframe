<?php

namespace Webandco\Wireframe\ViewHelpers;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Fluid\Core\ViewHelper\AbstractViewHelper;

class ShowElementsViewHelper extends AbstractViewHelper {

    /**
     * @param mixed $value Value to check
     *
     * @return bool the rendered string
     */
    public function render($value) {
        return ($value === null || $value === 0 || $value === '0') ? false : true;
    }
}