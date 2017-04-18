<?php

namespace Webandco\Wireframe\ViewHelpers;

use Neos\Flow\Annotations as Flow;
use Neos\FluidAdaptor\Core\ViewHelper\AbstractViewHelper;
use Neos\ContentRepository\Domain\Model\NodeInterface;

class RenderBoxViewHelper extends AbstractViewHelper {

    /**
     * Decide if box should be rendered or not based on renderMode and node properties
     *
     * @param integer $mode Value to check
     * @param NodeInterface $node
     *
     * @return boolean
     */
    public function render($mode, $node) {
        return ($mode > 0 || $node->hasProperty('renderBox') == false || $node->getProperty('renderBox') === null || $node->getProperty('renderBox') === true) ? true : false;
    }
}