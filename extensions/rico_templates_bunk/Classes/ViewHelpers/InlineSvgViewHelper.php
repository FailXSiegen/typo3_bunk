<?php

/**
 * This file is part of the "rico_templates_bunk" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2020 PSVneo
 */

namespace Riconet\RicoTemplatesBunk\ViewHelpers;

use InvalidArgumentException;
use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;

/**
 * Class InlineSvgViewHelper.
 *
 * <b>How to use:</b><br>
 * <p>
 * {namespace r=Riconet\RicoTemplatesBunk\ViewHelpers}
 *
 * ...
 *  <r:inlineSvg filePath="/absolute/path/to/some_file.svg" removeStyleAttributes="1" />
 * </p>
 */
class InlineSvgViewHelper extends AbstractViewHelper
{
    const SELECT_STYLE_ATTRIBUTE_REGEX = ['/(style=\".*?\")/'];

    public function render($absoluteFilePath, bool $removeStyleAttributes = false, array $additionalRemoveTagRegex = [])
    {
        if (!file_exists($absoluteFilePath)) {
            throw new InvalidArgumentException("file *$absoluteFilePath* does not exist on the server.");
        }
        $content = (string) file_get_contents($absoluteFilePath);
        if (empty($content)) {
            return '';
        }
        if ($removeStyleAttributes) {
            $regex = array_merge(self::SELECT_STYLE_ATTRIBUTE_REGEX, $additionalRemoveTagRegex);

            return preg_replace($regex, '', $content);
        }

        return $content;
    }
}
