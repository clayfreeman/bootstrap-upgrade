<?php
  /**
   * This file declares the base class for all Bootstrap target versions.
   *
   * @copyright  Copyright 2018 Clay Freeman. All rights reserved.
   * @license    GNU Lesser General Public License v3 (LGPL-3.0).
   */

  // This file's declarations should fall under 'Bootstrap\Upgrade'
  namespace Bootstrap\Upgrade;

  /**
   * This class is responsible for defining the `rewrite()` method that is
   * common to all Bootstrap target versions.
   */
  abstract class Target {
    /**
     * An empty base definition of class rewrite rules.
     *
     * @var  array
     */
    protected $replacements = [];

    /**
     * Processes the provided input data by rewriting its classes according to
     * the defined rules in this target instance.
     *
     * @param   string   $input     HTML markup to be processed.
     * @param   boolean  $document  Whether a full document (`true`) or partial
     *                              document (`false`) should be returned.
     *
     * @return  string              Processed HTML markup.
     */
    public function rewrite(string $input, bool $document = true): string {
      // Parse the input string so that classes can be rewritten
      $parser = new \Bootstrap\Upgrade\Parser($input);
      // Iterate over each configured filter's replacements
      foreach ($this->replacements as $filter => $replacements)
        // Iterate over each replacement within this filter
        foreach ($replacements as $pattern => $replacement)
          // Rewrite classes matching the configured filter & pattern
          $parser->rewriteClass($filter, $pattern, $replacement);
      // Return the modified input in the requested format
      return $parser->dump($document);
    }
  }
