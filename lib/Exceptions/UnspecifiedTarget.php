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
   * This exception describes an unspecified target version. This means that the
   * upgrade driver doesn't know the desired Bootstrap output version.
   */
  final class UnspecifiedTarget extends \Exception {
    /**
     * Override the default message of the base class.
     */
    public function __construct() {
      // Force the exception message to a default value
      parent::__construct('A target version must be specified.');
    }
  }
