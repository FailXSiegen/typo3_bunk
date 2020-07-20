<?php

/**
 * This file is part of the "rico_templates_bunk" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2020 PSVneo
 */

declare(strict_types=1);

namespace Riconet\RicoTemplatesBunk\DataProcessing;

/**
 * Fetch records from the database, using the default .select syntax from TypoScript.
 */
class GridChildrenProcessor extends \GridElementsTeam\Gridelements\DataProcessing\GridChildrenProcessor
{
    /**
     * @param array $data
     */
    protected function checkOptions(&$data): void
    {
        if (
            (
                $this->options['resolveBackendLayout'] ||
                $this->options['respectColumns'] ||
                $this->options['respectRows']
            ) && !$this->layoutSetup->getRealPid()
        ) {
            $this->layoutSetup->init((int) $data['pid'], $this->contentObjectConfiguration);
        }

        if ($this->options['resolveFlexFormData'] && !empty($data['pi_flexform'])) {
            $this->gridelements->initPluginFlexForm('pi_flexform', $data);
            $this->gridelements->getPluginFlexFormData($data);
        }
        if ($this->options['resolveBackendLayout']) {
            if (!empty($this->layoutSetup->getLayoutSetup($data['tx_gridelements_backend_layout']))) {
                $data['tx_gridelements_backend_layout_resolved'] =
                    $this->layoutSetup->getLayoutSetup($data['tx_gridelements_backend_layout']);
            } elseif (!empty($this->layoutSetup->getLayoutSetup('default'))) {
                $data['tx_gridelements_backend_layout_resolved'] =
                    $this->layoutSetup->getLayoutSetup('default');
            }
        }
    }
}
