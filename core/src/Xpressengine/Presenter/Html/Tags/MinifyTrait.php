<?php
/**
 * MinifyTrait
 *
 * PHP version 5
 *
 * @category    Frontend
 * @package     Xpressengine\Presenter
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     LGPL-2.1
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Presenter\Html\Tags;

/**
 * MinifyTrait
 *
 * @category    Frontend
 * @package     Xpressengine\Presenter
 */
trait MinifyTrait
{
    /**
     * @var string
     */
    protected $minified;

    /**
     * @var bool
     */
    protected $useMinified;

    /**
     * min
     *
     * @param string     $minified    minified
     * @param bool|false $useMinified use minified
     * @return $this
     */
    public function min($minified, $useMinified = false)
    {
        $this->minified    = $minified;
        $this->useMinified = $useMinified;
        return $this;
    }
}
