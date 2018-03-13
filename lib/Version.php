<?php
  /**
   * This file declares an enumeration of all implemented Bootstrap versions.
   *
   * @copyright  Copyright 2018 Clay Freeman. All rights reserved.
   * @license    GNU Lesser General Public License v3 (LGPL-3.0).
   */

  // This file's declarations should fall under 'Bootstrap\Upgrade'
  namespace Bootstrap\Upgrade;

  /**
   * An enumeration of all available Bootstrap versions.
   */
  final class Version extends \MabeEnum\Enum {
    /**
     * Bootstrap major version 1.x.
     *
     * @var  integer
     */
    const Bootstrap1 = 1;

    /**
     * Bootstrap major version 2.x.
     *
     * @var  integer
     */
    const Bootstrap2 = 2;

    /**
     * Bootstrap major version 3.x.
     *
     * @var  integer
     */
    const Bootstrap3 = 3;

    /**
     * Bootstrap major version 4.x.
     *
     * @var  integer
     */
    const Bootstrap4 = 4;

    /**
     * Fetches the next version relative to the current version.
     *
     * @return  Version  The next version.
     */
    public function next(): Version {
      // Fetch an instance to the current version incremented by 1
      return Version::byValue($this->getValue() + 1);
    }
  }
