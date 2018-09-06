<?php

namespace App\Objects;

use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\TextField;
use SilverSTripe\Forms\FieldList;
use SilverStripe\ORM\DataObject;
use App\Pages\HomePage;

/**
 * Description
 *
 * @package silverstripe
 * @subpackage mysite
 */
class Benefit extends DataObject
{
  /**
   * Default sort ordering
   * @var array
   */
  private static $default_sort = 'SortOrder';

  /**
   * Database fields
   * @var array
   */
  private static $db = [
    'Title' => 'Varchar',
    'Content' => 'Text',
    'SortOrder' => 'Int'
  ];

  /**
   * Has_one relationship
   * @var array
   */
  private static $has_one = [
    'HomePage' => HomePage::class,
  ];

  /**
   * Defines summary fields commonly used in table columns
   * as a quick overview of the data for this dataobject
   * @var array
   */
  private static $summary_fields = [
    'Title' => 'Titel'
  ];

  /**
   * CMS Fields
   * @return FieldList
   */
  public function getCMSFields()
  {
    return FieldList::create(
      TextField::create('Title', 'Titel'),
      TextareaField::create('Content', 'Inhoud')
    );
  }
}
