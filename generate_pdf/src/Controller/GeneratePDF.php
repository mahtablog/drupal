<?php
/**
 * @file
 * Contains \Drupal\generate_pdf\Controller\GeneratePDF.php
 */
 
namespace Drupal\generate_pdf\Controller;
 
use Drupal\Core\Controller\ControllerBase;
 
class GeneratePDF extends ControllerBase {
  public function getSave() {
    return array(
      '#type' => 'markup',
      '#markup' => t('This will generate PDF and save to disk. This will extend Entity Print module functionality to save pdf. '),
    );
  }
}