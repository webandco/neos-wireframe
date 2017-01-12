<?php
namespace Webandco\Wireframe\TypoScript;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Neos\Domain\Model\UserInterfaceMode;
use TYPO3\TypoScript\TypoScriptObjects\AbstractTypoScriptObject;
use TYPO3\Neos\Domain\Service\UserInterfaceModeService;

class WireframeContentImplementation extends AbstractTypoScriptObject {

    /**
     * @Flow\InjectConfiguration(path="userInterface.editPreviewModes", package="TYPO3.Neos")
     * @var array
     */
    protected $editPreviewModes;


    /**
     * @Flow\Inject
     * @var UserInterfaceModeService
     */
    protected $interfaceRenderModeService;

    /**
     * Evaluate this TypoScript object and return the result
     *
     * @return boolean
     */
    public function evaluate()
    {
        /** @var UserInterfaceMode $mode */
        $mode = $this->interfaceRenderModeService->findModeByCurrentUser();

        /** @var boolean $isWireframeMode */
        $isWireframeMode = $mode->getName() === 'wireframe';

        return  $isWireframeMode;
    }
}