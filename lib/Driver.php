<?php
  /**
   * This file declares a class responsible for managing the upgrade process.
   *
   * @copyright  Copyright 2018 Clay Freeman. All rights reserved.
   * @license    GNU Lesser General Public License v3 (LGPL-3.0).
   */

  // This file's declarations should fall under 'Bootstrap\Upgrade'
  namespace Bootstrap\Upgrade;

  use \Bootstrap\Upgrade\Exceptions\InvalidRange;
  use \Bootstrap\Upgrade\Exceptions\UnspecifiedSource;
  use \Bootstrap\Upgrade\Exceptions\UnspecifiedTarget;
  use \Bootstrap\Upgrade\TargetFactory;
  use \Bootstrap\Upgrade\Version;

  /**
   * This class is responsible for managing the upgrade process over a range of
   * Bootstrap versions.
   */
  class Driver {
    /**
     * The version of Bootstrap that the input is using.
     *
     * @var  Version
     */
    protected $source   = null;

    /**
     * The desired Bootstrap output version after upgrading.
     *
     * @var  Version
     */
    protected $target   = null;

    /**
     * Whether a full document or a code snippet is being processed.
     *
     * This flag will change the format of the output independent of input.
     *
     * @var  boolean
     */
    protected $document = true;

    /**
     * Sets the full-document setting for the current instance.
     *
     * @param   bool    $document  Whether the input should be treated as a
     *                             full-document (`true`) or a code snippet
     *                             (`false`).
     *
     * @return  Driver             A reference to the current instance.
     */
    public function document(bool $document): Driver {
      // Overwrite the full-document setting with the provided value
      $this->document = $document;
      // Return a reference to this instance for use in method chaining
      return $this;
    }

    /**
     * Runs the upgrade driver using the configured settings.
     *
     * @param   string     $input  The input string.
     *
     * @throws  InvalidRange       When the source version is greater than or
     *                             equal to the target version.
     * @throws  UnspecifiedSource  When the source version has yet to be
     *                             specified via `source()`.
     * @throws  UnspecifiedTarget  When the target version has yet to be
     *                             specified via `target()`.
     *
     * @return  string             The upgraded input.
     */
    public function run(string $input): string {
      // Ensure that the source version has been specified
      if (!$this->source instanceof Version)
        throw new UnspecifiedSource;
      // Ensure that the target version has been specified
      if (!$this->target instanceof Version)
        throw new UnspecifiedTarget;
      // Ensure that the source version is less than the target version
      if ($this->source->getValue() >= $this->target->getValue())
        throw new InvalidRange;
      // Iterate over the range (source,target] to upgrade the input
      $current = $this->source;
      do {
        // Increment the source version by one to select the next target
        $current = $current->next();
        $target = TargetFactory::getTarget($current);
        // Perform the upgrade to the current target version
        $input = $target->rewrite($input, $this->document);
      } while (!$current->is($this->target));
      return $input;
    }

    /**
     * Sets the source version of the input.
     *
     * @param   Version  $source  The source version to be upgraded from.
     *
     * @return  Driver            A reference to the current instance.
     */
    public function source(Version $source): Driver {
      // Overwrite the source version with the provided version
      $this->source = $source;
      // Return a reference to this instance for use in mathod chaining
      return $this;
    }

    /**
     * Sets the target version of the output.
     *
     * @param   Version  $target  The target version to be upgraded to.
     *
     * @return  Driver            A reference to the current instance.
     */
    public function target(Version $target): Driver {
      // Overwrite the target version with the provided version
      $this->target = $target;
      // Return a reference to this instance for use in mathod chaining
      return $this;
    }
  }
