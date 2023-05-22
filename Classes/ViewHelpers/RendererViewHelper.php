<?php

namespace SMS\FluidComponents\ViewHelpers;

use TYPO3Fluid\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

class RendererViewHelper extends AbstractViewHelper
{
    /**
     * @var boolean
     */
    protected $escapeOutput = false;

    public function initializeArguments()
    {
        parent::initializeArguments();
        $this->registerArgument(
            'customElement',
            'string',
            'Define custom HTML element using declarative shadow DOM'
        );
    }

    /*
     * @param array $arguments
     * @param \Closure $renderChildrenClosure
     * @param RenderingContextInterface $renderingContext
     * @return string
     */
    public static function renderStatic(array $arguments, \Closure $renderChildrenClosure, RenderingContextInterface $renderingContext)
    {
        if (isset($arguments['customElement'])) {
            return sprintf(
                '<%1$s><template shadowrootmode="open">%2$s</template></%1$s>',
                (string) $arguments['customElement'],
                $renderChildrenClosure()
            );
        }
        return $renderChildrenClosure();
    }
}
