<?php

namespace App\Pages;

use PageController;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class HomePageController extends PageController
{
  public function Challenges() {
    return ChallengePage::get()->filter(array('FeatureOnHomepage' => true))->sort('Created', 'DESC')->limit(3);
  }
}
