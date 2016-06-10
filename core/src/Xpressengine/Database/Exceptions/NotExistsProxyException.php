<?php
/**
 * NotExistsProxyException
 *
 * PHP version 5
 *
 * @category    Database
 * @package     Xpressengine\Database
 * @author      XE Developers <developers@xpressengine.com>
 * @copyright   2015 Copyright (C) NAVER Corp. <http://www.navercorp.com>
 * @license     LGPL-2.1
 * @license     http://www.gnu.org/licenses/old-licenses/lgpl-2.1.html
 * @link        https://xpressengine.io
 */

namespace Xpressengine\Database\Exceptions;

use Xpressengine\Database\DatabaseException;

/**
 * NotExistsProxyException
 *
 * @category    Database
 * @package     Xpressengine\Database
 */
class NotExistsProxyException extends DatabaseException
{
    protected $message = 'Proxy not exists.';
}
