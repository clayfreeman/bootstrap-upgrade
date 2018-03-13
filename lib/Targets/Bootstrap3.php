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
   * Bootstrap 2 to Bootstrap 3.
   */
  class Bootstrap3 extends \Bootstrap\Upgrade\Target {
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
      '[class]' => [
        // Grid System
        '/^container-fluid$/' => 'container',
        '/^row-fluid$/' => 'row',
        '/^span(\\d+)$/' => 'col-md-$1',
        '/^offset(\\d+)$/' => 'col-md-offset-$1',
        '/^visible-phone$/' => 'visible-xs',
        '/^visible-tablet$/' => 'visible-sm',
        '/^visible-desktop$/' => 'visible-md',
        '/^hidden-phone$/' => 'hidden-xs',
        '/^hidden-tablet$/' => 'hidden-sm',
        '/^hidden-desktop$/' => 'hidden-md',
        // Nav, Navbar
        '/^brand$/' => 'navbar-brand',
        '/^nav-collapse$/' => 'navbar-collapse',
        '/^nav-toggle$/' => 'navbar-toggle',
        '/^btn-navbar$/' => 'navbar-btn',
        // Buttons
        '/^btn-mini$/' => 'btn-xs',
        '/^btn-small$/' => 'btn-sm',
        '/^btn-large$/' => 'btn-lg',
        // Alerts
        '/^alert$/' => 'alert alert-warning',
        '/^alert-error$/' => 'alert-danger',
        // Forms
        '/^input-block-level$/' => 'form-control',
        '/^control-group$/' => 'form-group',
        '/^input-(prepend|append)$/' => 'input-group',
        '/^add-on$/' => 'input-group-addon',
        // Misc
        '/^img-polaroid$/' => 'img-thumbnail',
        '/^thumbnail$/' => 'img-thumbnail',
        '/^hero-unit$/' => 'jumbotron',
        '/^icon-(.+)$/' => 'glyphicon glyphicon-$1',
        // Typography
        '/^muted$/' => 'text-muted',
        '/^label-important$/' => 'label-danger',
        '/^text-error$/' => 'text-danger',
        // Progress Bars
        '/^bar$/' => 'progress-bar',
        '/^bar-(.+)/' => 'progress-bar-$1',
        // Panels
        '/^accordion$/' => 'panel-group',
        '/^accordion-group$/' => 'panel panel-default',
        '/^accordion-heading$/' => 'panel-heading',
        '/^accordion-body$/' => 'panel-collapse',
        '/^accordion-inner$/' => 'panel-body'
      ],
      '.btn' => [
        '' => 'btn-default'
      ],
      '.checkbox' => [
        '/^inline$/' => 'checkbox-inline'
      ],
      '.form-group' => [
        '/^(error|success|warning)$/' => 'has-$1'
      ],
      '.label' => [
        '' => 'label-default'
      ],
      '.nav' => [
        '/^navbar$/' => 'navbar-nav'
      ],
      '.radio' => [
        '/^inline$/' => 'radio-inline'
      ],
      '.table' => [
        '/^error$/' => 'danger'
      ]
    ];
  }
