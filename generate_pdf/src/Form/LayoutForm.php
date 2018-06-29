<?php
/**
 * @file
 * Contains \Drupal\generate_pdf\Form\LayoutForm.
 */
namespace Drupal\generate_pdf\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class LayoutForm extends FormBase {
  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'layout_form';
  }
	   /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
	
    $form['layout_name'] = array(
      '#type' => 'textfield',
      '#title' => t('Layout Name:'),
      '#required' => TRUE,
    );

    $form['page_settings'] = array(
      '#type' => 'fieldset',
      '#title' => t('Page Settings'),
    );

    $form['page_settings']['dimenssion'] = array (
      '#type' => 'select',
      '#title' => t('Unit'),
      '#options' => array(
        'cm' => t('cm'),
        'mm' => t('mm'),
				'in' => t('inches'),
      ),
    );

    $form['page_settings']['page_width'] = array(
    '#type' => 'number',
    '#title' => t('Page Width'),
    );

    $form['page_settings']['page_height']= array(
    '#type' => 'number',
    '#title' => t('Page Height'),
    );

    $form['page_settings']['margin_top'] = array(
    '#type' => 'number',
    '#title' => t('Margin Top'),
    );

    $form['page_settings']['margin_bottom']= array(
    '#type' => 'number',
    '#title' => t('Margin Bottom'),
    );

    $form['page_settings']['margin_left']= array(
    '#type' => 'number',
    '#title' => t('Margin Left'),
    );

    $form['page_settings']['margin_right'] = array(
    '#type' => 'number',
    '#title' => t('Margin Right'),
    );
		
    $form['pdf_layout_preview'] = array(
      '#type' => 'fieldset',
      '#title' => $this ->t('Layout Preview'),
    );
    $form['pdf_layout_preview']['layout_preview'] = array(
      '#type' => 'managed_file',
      '#name' => 'layout_preview',
      '#title' => t('Layout Static Preview'),
      '#size' => 20,
      '#description' => t('Files must be less than 1MB </br> Allowed file types png jpg jpeg'),
	    '#upload_validators'  => array(
		    'file_validate_extensions' => array('png jpg jpeg'),
		    'file_validate_size' => array(1000000),
	    ),
      '#upload_location' => 'public://layout_preview/',
    );
    $form['pdf_layout_preview']['cover_preview'] = array(
      '#type' => 'managed_file',
      '#name' => 'cover_preview',
      '#title' => t('Cover Static Preview*'),
      '#size' => 20,
      '#description' => t('Files must be less than 1MB </br> Allowed file types png jpg jpeg'),
	    '#upload_validators'  => array(
		    'file_validate_extensions' => array('png jpg jpeg'),
		    'file_validate_size' => array(1000000),
	    ),
      '#upload_location' => 'public://cover_preview/',
    );
    $form['pdf_layout_preview']['climax_preview'] = array(
      '#type' => 'managed_file',
      '#name' => 'climax_preview',
      '#title' => t('Climax Static Preview'),
      '#size' => 20,
      '#description' => t('Files must be less than 1MB </br> Allowed file types png jpg jpeg'),
	    '#upload_validators'  => array(
		    'file_validate_extensions' => array('png jpg jpeg'),
		    'file_validate_size' => array(1000000),
	    ),
      '#upload_location' => 'public://climax_preview/',
    );
    $form['active'] = array(
      '#type' => 'checkbox',
      '#title' => t('Active'),
    );
    $form['actions']['#type'] = 'actions';
	
    $form['actions']['cancel'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Cancel'),
      '#button_type' => 'primary',
    );
		
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Save'),
      '#button_type' => 'primary',
    );
    return $form;
  }
  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
   // drupal_set_message($this->t('@can_name ,Your application is being submitted!', array('@can_name' => $form_state->getValue('candidate_name'))));
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }
   }
}