<?php
  /**
   * This file defines the parser (and rewrite method) used in upgrading to
   * different versions of Bootstrap.
   *
   * @copyright  Copyright 2018 Clay Freeman. All rights reserved.
   * @license    GNU Lesser General Public License v3 (LGPL-3.0).
   */

  // This file's declarations should fall under 'Bootstrap\Upgrade'
  namespace Bootstrap\Upgrade;

  /**
   * Extends Symfony's DOM Crawler component to add support for globally
   * rewriting class names and printing full or partial documents.
   *
   * The ability to rewrite class names is crucial for upgrading from older to
   * newer versions of the Bootstrap responsive design framework.
   */
  class Parser extends \Symfony\Component\DomCrawler\Crawler {
    /**
     * Generates markup for the current state of the DOM tree.
     *
     * @param   boolean  $document  Whether a full document (`true`) or partial
     *                              document (`false`) should be returned.
     *
     * @return  string              Markup representing the DOM.
     */
    public function dump(bool $document = true): string {
      // If a full document is requested, use DOMDocument to build the output
      return trim($document ? $this->getNode(0)->ownerDocument->saveHTML() :
                              // If only the contents are requested, get the
                              // inner HTML of the body tag
                              $this->filter('body')->html());
    }

    /**
     * Uses regular expressions to rewrite classes.
     *
     * This method iterates over each node with a class attribute, extracts
     * each class identifier, then performs the requested replacement on it.
     *
     * If the pattern parameter is an empty string, then the replacement
     * parameter will be appended to the value of the class attribute. This
     * will likely only be useful when a filter is used.
     *
     * @param  string  $filter       A filter used to drill down on specific
     *                               elements (CSS selector).
     * @param  string  $pattern      A pattern describing the original format
     *                               of the class identifier.
     * @param  string  $replacement  A replacement pattern (capable of
     *                               backreferences) describing the new format
     *                               of the class identifier.
     */
    public function rewriteClass(string $filter, string $pattern,
        string $replacement): void {
      // Iterate over each DOM element that has a class attribute
      foreach ($this->filter($filter)->getIterator() as $node) {
        // Fetch the class attribute from this node for processing
        $classNames = trim(preg_replace('/\\s+/', ' ',
          $node->getAttribute('class')));
        // Check whether this rule modifies a class or appends one
        if (strlen($pattern) > 0) {
          // Match each class identifier and perform an isolated replacement
          $classNames  = preg_replace_callback('/\\b[a-z][a-z0-9-_]*/i',
          function($matches) use ($pattern, $replacement) {
            // Use the provided pattern and replacement to modify the identifier
            return preg_replace($pattern, $replacement, $matches[0]);
          }, $classNames);
        } else {
          // Append the replacement class to the list of class names
          $classNames .= ' '.$replacement;
        } // Re-assign the modified class attribute for this node
        $node->setAttribute('class', $classNames);
      }
    }
  }
