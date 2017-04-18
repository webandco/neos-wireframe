<?php
namespace Webandco\Wireframe\Fusion;

use Neos\Flow\Annotations as Flow;
use Neos\Neos\Domain\Model\UserInterfaceMode;
use Neos\Fusion\FusionObjects\AbstractFusionObject;
use Neos\Neos\Domain\Service\UserInterfaceModeService;
use Neos\Flow\Http\Request;

class WireframeContentImplementation extends AbstractFusionObject {

    /**
     * @Flow\InjectConfiguration(path="userInterface.editPreviewModes", package="Neos.Neos")
     * @var array
     */
    protected $editPreviewModes;


    /**
     * @Flow\Inject
     * @var UserInterfaceModeService
     */
    protected $interfaceRenderModeService;

    /**
     * Evaluate wireframe rendering mode
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