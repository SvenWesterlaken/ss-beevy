<?php

namespace App\Pages;

use SilverStripe\CMS\Controllers\ContentController;
use SilverStripe\ORM\DataObject;
use SilverStripe\UserForms\Control\UserDefinedFormController;
use PageController;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class ContactPageController extends PageController
{
  public function GetContactForm() {
    $record = DataObject::get_one("SilverStripe\UserForms\Model\UserDefinedForm", "ParentID = $this->ID");
    $results = new UserDefinedFormController($record);

    if (!empty($record)) {
      return $results;
    }
  }

}
