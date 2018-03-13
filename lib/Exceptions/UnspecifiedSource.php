<?php
  /**
   * This file declares an exception used throughout the library.
   *
   * @copyright  Copyright 2018 Clay Freeman. All rights reserved.
   * @license    GNU Lesser General Public License v3 (LGPL-3.0).
   */

  // This file's declarations should fall under 'Bootstrap\Upgrade\Exceptions'
  namespace Bootstrap\Upgrade\Exceptions;

  /**
   * This exception describes an unspecified source version. This means that the
   * upgrade driver doesn't know what version of Bootstrap the input is using.
   */
  final class UnspecifiedSource extends \Exception {
    /**
     * Override the default message of the base class.
     */
    public function __construct() {
      // Force the exception message to a default value
      parent::__construct('A source version must be specified.');
    }
  }
