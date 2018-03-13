<?php
  /**
   * This file declares a target version of Bootstrap used to upgrade.
   *
   * @copyright  Copyright 2018 Clay Freeman. All rights reserved.
   * @license    GNU Lesser General Public License v3 (LGPL-3.0).
   */

  // This file's declarations should fall under 'Bootstrap\Upgrade\Targets'
  namespace Bootstrap\Upgrade\Targets;

  /**
   * A pseudo-version of Bootstrap that doesn't actually require an
   * implementation since it will never be a target version.
   */
  class Bootstrap1 extends \Bootstrap\Upgrade\Target {}
