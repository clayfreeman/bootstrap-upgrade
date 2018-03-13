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
   * This class defines the necessary class rewrite rules for upgrading from
   * Bootstrap 3 to Bootstrap 4.
   */
  class Bootstrap4 extends \Bootstrap\Upgrade\Target {
    /**
     * This array contains class rewrite rules processed by the base class
     * implementation of the `rewrite()` method.
     *
     * This is a multi-dimensional array consisting of the following structure:
     *
     * ['filter' => ['pattern' => 'replacement']]
     *
     * @var  array
     */
    protected $replacements = [
      // Generic replacements that are not context-sensitive
      '[class]' => [
        // Images
        '/^img-responsive$/' => 'img-fluid',
        '/^img-rounded$/' => 'rounded',
        '/^img-circle$/' => 'rounded-circle',
        // Tables
        '/^table-condensed$/' => 'table-sm',
        '/^active$/' => 'table-active',
        '/^success$/' => 'table-success',
        '/^info$/' => 'table-info',
        '/^warning$/' => 'table-warning',
        '/^danger$/' => 'table-danger',
        // Forms
        '/^control-label$/' => 'form-control-label',
        '/^input-(lg|sm)$/' => 'form-control-$1',
        '/^form-group-(.+)$/' => 'form-control-$1',
        '/^help-block$/' => 'form-text',
        '/^row$/' => 'form-row',
        '/^has-error$/' => 'has-danger',
        '/^form-control-static$/' => 'form-control-plaintext',
        '/^radio$/' => 'form-check',
        '/^checkbox$/' => 'form-check',
        '/^text-help$/' => 'form-control-feedback',
        // Buttons
        '/^btn-default$/' => 'btn-secondary',
        // Dropdowns
        '/^divider$/' => 'dropdown-divider',
        // Grid System
        '/^col-lg-/' => 'col-xl-',
        '/^col-md-/' => 'col-lg-',
        '/^col-sm-/' => 'col-md-',
        '/^col-xs-/' => 'col-sm-',
        '/^col-([^-]{2})-([^-]+)-(\d+)$/' => '$2-$1-$3',
        '/^pull-(left|right)$/' => 'float-$1',
        '/^center-block$/' => 'mx-auto',
        '/^hidden-xs$/' => 'd-none',
        '/^hidden-sm$/' => 'd-sm-none',
        '/^hidden-md$/' => 'd-md-none',
        '/^visible-xs$/' => 'd-block d-sm-none',
        '/^visible-sm$/' => 'd-block d-md-none',
        '/^visible-md$/' => 'd-block d-lg-none',
        '/^visible-lg$/' => 'd-block d-xl-none',
        // Labels
        '/^badge$/' => 'badge badge-pill',
        '/^label$/' => 'badge',
        // Nav
        '/^nav-stacked$/' => 'flex-column',
        // Navbar
        '/^navbar-default$/' => 'navbar-light',
        '/^navbar-toggle$/' => 'navbar-toggler',
        '/^navbar-form$/' => 'form-inline',
        '/^navbar-right$/' => 'ml-auto',
        '/^navbar-btn$/' => 'nav-item',
        '/^navbar-fixed-top$/' => 'fixed-top',
        // Panels
        '/^panel$/' => 'card',
        '/^panel-group$/' => 'card-group',
        '/^panel-heading$/' => 'card-header',
        '/^panel-title$/' => 'card-title',
        '/^panel-body$/' => 'card-body',
        '/^panel-footer$/' => 'card-footer',
        '/^panel-primary$/' => 'card bg-primary text-white',
        '/^panel-success$/' => 'card bg-success text-white',
        '/^panel-info$/' => 'card bg-info text-white',
        '/^panel-warning$/' => 'card bg-warning text-white',
        '/^panel-danger$/' => 'card bg-danger text-white',
        // Carousel
        '/^item$/' => 'carousel-item',
        '/^next$/' => 'carousel-item-next',
        '/^pref$/' => 'carousel-item-pref',
        '/^left$/' => 'carousel-item-left',
        '/^right$/' => 'carousel-item-right'
      ],
      'blockquote' => [
        '' => 'blockquote'
      ],
      '.carousel-control' => [
        '/^left$/' => 'carousel-control-left',
        '/^right$/' => 'carousel-control-right',
      ],
      '.dropdown-menu > li' => [
        '' => 'dropdown-item'
      ],
      '.list-inline > li' => [
        '' => 'list-inline-item'
      ],
      '.nav > li' => [
        '' => 'nav-item'
      ],
      '.nav > li > a' => [
        '' => 'nav-link'
      ],
      '.pagination > li' => [
        '' => 'page-item'
      ],
      '.pagination > li > a' => [
        '' => 'page-link'
      ]
    ];
  }
