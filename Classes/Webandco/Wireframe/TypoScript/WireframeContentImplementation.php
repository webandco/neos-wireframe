<?php
namespace Webandco\Wireframe\TypoScript;

use TYPO3\Flow\Annotations as Flow;
use TYPO3\Neos\Domain\Model\UserInterfaceMode;
use TYPO3\TypoScript\TypoScriptObjects\AbstractTypoScriptObject;
use TYPO3\Neos\Domain\Service\UserInterfaceModeService;
use TYPO3\Flow\Http\Request;

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
     * @return integer
     */
    public function evaluate()
    {

        $httpRequest = Request::createFromEnvironment();

        /** @var UserInterfaceMode $mode */
        $mode = $this->interfaceRenderModeService->findModeByCurrentUser();

        /** @var integer $renderMode */
        $renderMode = 0;

        switch (true) {
            case $mode->getName() === 'wireframe' || $httpRequest->getArgument('wireframeMode') == '1' :
                $renderMode = 1;
                break;
            case $httpRequest->getArgument('wireframeMode') == '2' :
                $renderMode = 2;
                break;
        }

        return $renderMode;
    }
}