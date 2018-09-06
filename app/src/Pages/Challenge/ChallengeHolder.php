<?php

namespace App\Pages;

use SilverStripe\CMS\Model\SiteTree;
use Page;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ChallengeHolder extends Page
{
  /**
   * Defines the allowed child page types
   * @var array
   */
  private static $allowed_children = [
    ChallengePage::class
  ];
}
