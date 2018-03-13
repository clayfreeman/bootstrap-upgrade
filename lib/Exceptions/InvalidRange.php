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
   * This exception describes an invalid upgrade range. Valid ranges consist of
   * a source and target version where the source is less than the target.
   */
  final class InvalidRange extends \Exception {
    /**
     * Override the default message of the base class.
     */
    public function __construct() {
      // Force the exception message to a default value
      parent::__construct('An invalid range was specified; the source version '.
        'must be less than the target version.');
    }
  }
