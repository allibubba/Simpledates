<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
=====================================================
 Authur: Jackson Oates
-----------------------------------------------------
 https://github.com/allibubba/Simpledates
=====================================================
 This program is freeware;
 you may use this code for any purpose, commercial or
 private, without any further permission from the author.
=====================================================
 File: pi.simpledates.php
=====================================================
*/


$plugin_info = array(
    'pi_name'           => 'Simpledates',
    'pi_version'        => '1.0',
    'pi_author'         => 'Jackson Oates',
    'pi_description'    => 'Date formatting beyond EE dates',
    'pi_usage'          => Simpledates::usage()
);

class Simpledates {

  public $current;
  public $format;

  public function __construct()
  {
      $this->EE =& get_instance();

      $this->current = ee()->TMPL->fetch_param('current', new DateTime());
      $this->format = ee()->TMPL->fetch_param('format', 'Y-m-d');

  }

  // ============ Public ============ //
  public function lastdate()
  {
    return date($this->format, strtotime( $this->current )); 
  }

  public function tomorrow()
  {
    $time = strtotime( $this->current );
    return date($this->format, strtotime("tomorrow", $time));
  }

  public function this_month()
  {
    $datetime = new DateTime();
    return $datetime->format( $this->format );
  }

  public function next_month()
  {
    $time = strtotime( $this->current );
    return date("Y-m-01", strtotime("next month", $time));
  }

  public function previous_month()
  {
    $time = strtotime( $this->current );
    return date("Y-m-01", strtotime("previous month", $time));
  }

  public function segment_to_date()
  {
    $f = date($this->format, strtotime( $this->current )); 
  }
  // ============ Private ============ //

  private function now ($str=null)
  {
    return new DateTime($str);
  }

function usage()
    {

ob_start();
?>
Return the last day of the current month:
{exp:simpledates:lastdate}
{exp:simpledates:tomorrow}
<?php
$buffer = ob_get_contents();

ob_end_clean();

return $buffer;

    }

}
