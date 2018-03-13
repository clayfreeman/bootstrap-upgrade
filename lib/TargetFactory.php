<?php
  /**
   * This file declares a factory class that builds `Target` instances.
   *
   * @copyright  Copyright 2018 Clay Freeman. All rights reserved.
   * @license    GNU Lesser General Public License v3 (LGPL-3.0).
   */

  // This file's declarations should fall under 'Bootstrap\Upgrade'
  namespace Bootstrap\Upgrade;

  use \Bootstrap\Upgrade\Exceptions\UnknownTarget;
  use \Bootstrap\Upgrade\Target;
  use \Bootstrap\Upgrade\Version;

  /**
   * This class is responsible for building a `Target` instance corresponding to
   * the requested version.
   */
  abstract class TargetFactory {
    /**
     * Fetches a `Target` instance for the requested version.
     *
     * @param   Version  $version  The desired Bootstrap target version.
     *
     * @return  Target             A Bootstrap target containing the necessary
     *                             class rewrite rules for upgrading.
     */
    public static function getTarget(Version $version): Target {
      // Attempt to determine which version should be targetted
      switch ($version) {

        // In this case, return an instance to the Bootstrap1 target
        case Version::Bootstrap1():
          return new \Bootstrap\Upgrade\Targets\Bootstrap1;
          break;

        // In this case, return an instance to the Bootstrap2 target
        case Version::Bootstrap2():
          return new \Bootstrap\Upgrade\Targets\Bootstrap2;
          break;

        // In this case, return an instance to the Bootstrap3 target
        case Version::Bootstrap3():
          return new \Bootstrap\Upgrade\Targets\Bootstrap3;
          break;

        // In this case, return an instance to the Bootstrap4 target
        case Version::Bootstrap4():
          return new \Bootstrap\Upgrade\Targets\Bootstrap4;
          break;

        // If an implemented version cannot be found, throw an exception
        default:
          throw new UnknownTarget;

      }
    }
  }
