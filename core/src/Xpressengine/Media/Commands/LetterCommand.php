<?php
/**
 * This file is letter command
 *
 * PHP version 5
 *
 * @category    Media
 * @package     Xpressengine\Media
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     LGPL-2.1
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Media\Commands;

use Xpressengine\Media\Coordinators\Dimension;

/**
 * 기준 사이즈 안에 이미지가 모두 들어오도록 하는 리사이징 command
 *
 * @category    Media
 * @package     Xpressengine\Media
 */
class LetterCommand extends AbstractCommand implements CommandInterface
{
    /**
     * Specific command name
     *
     * @return string
     */
    public function getName()
    {
        return 'letter';
    }

    /**
     * Executed command method name
     *
     * @return string
     */
    public function getMethod()
    {
        return 'resize';
    }

    /**
     * Arguments of executed method
     *
     * @return array
     */
    public function getExecArgs()
    {
        return $this->remakeDimensionAsRatio(
            $this->originDimension->getWidth(),
            $this->originDimension->getHeight(),
            $this->dimension->getWidth(),
            $this->dimension->getHeight()
        );
    }

    /**
     * get new dimension by keeping the ratio
     *
     * @param int $srcWidth  original width
     * @param int $srcHeight original height
     * @param int $dstWidth  be resize width
     * @param int $dstHeight be resize height
     * @return array
     */
    private function remakeDimensionAsRatio($srcWidth, $srcHeight, $dstWidth, $dstHeight)
    {
        $width = $srcWidth;
        $height = $srcHeight;

        $ratioH = $dstHeight / $height;
        $ratioW = $dstWidth / $width;
        $ratio = min($ratioH, $ratioW);

        if ($ratio < 1) {
            $width = intval($ratio * $width);
            $height = intval($ratio * $height);
        }

        return [$width, $height];
    }
}
