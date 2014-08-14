<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
=====================================================
 Authur: Jackson Oates
-----------------------------------------------------
 https://github.com/allibubba
=====================================================
 This program is freeware;
 you may use this code for any purpose, commercial or
 private, without any further permission from the author.
=====================================================
 File: pi.simpledates.php
=====================================================
*/


$plugin_info = array(
    'pi_name'           => 'Simple Dates',
    'pi_version'        => '1.0',
    'pi_author'         => 'Jackson Oates',
    'pi_description'    => 'Return formatted dates for unique situations',
    'pi_usage'          => Simpledates::usage()
);

class Simpledates {

  var $return_data;

  public function __construct()
  {
      $this->EE =& get_instance();

  }

  public function lastdate()
  {
    $tagdata = $this->EE->TMPL->tagdata;
    $format = $this->EE->TMPL->fetch_param('format');

    $this->return_data = date( $format );
    
    return $this->return_data;
  }

  public function tomorrow()
  {
    $tagdata = $this->EE->TMPL->tagdata;
    $format = $this->EE->TMPL->fetch_param('format');
    $datetime = new DateTime('tomorrow');
    $this->return_data = $datetime->format( $format );
    return $this->return_data;
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
