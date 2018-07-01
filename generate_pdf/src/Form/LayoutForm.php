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

    $form['dimenssion'] = array (
      '#type' => 'select',
      '#title' => t('Unit'),
      '#options' => array(
        'mm' => t('mm'),
				'in' => t('inches'),
      ),
    );

    $form['page_width'] = array(
    '#type' => 'number',
    '#title' => t('Page Width'),
    );

    $form['page_height']= array(
    '#type' => 'number',
    '#title' => t('Page Height'),
    );

    $form['margin_top'] = array(
    '#type' => 'number',
    '#title' => t('Margin Top'),
    );

    $form['margin_bottom']= array(
    '#type' => 'number',
    '#title' => t('Margin Bottom'),
    );

    $form['margin_left']= array(
    '#type' => 'number',
    '#title' => t('Margin Left'),
    );

    $form['margin_right'] = array(
    '#type' => 'number',
    '#title' => t('Margin Right'),
    );

    $form['horizontal_gutter'] = array(
    '#type' => 'number',
    '#title' => t('Horizontal Gutter'),
    );

    $form['vertical_gutter'] = array(
    '#type' => 'number',
    '#title' => t('Vertical Gutter'),
    );

    $form['layout_preview'] = array(
      '#type' => 'managed_file',
      '#name' => 'layout_preview',
      '#title' => t('Layout Static Preview'),
      '#size' => 20,
      '#description' => t('Files must be less than 1MB. Allowed file types png jpg jpeg'),
	    '#upload_validators'  => array(
		    'file_validate_extensions' => array('png jpg jpeg'),
		    'file_validate_size' => array(1000000),
	    ),
      '#upload_location' => 'public://layout_preview/',
    );
    $form['cover_preview'] = array(
      '#type' => 'managed_file',
      '#name' => 'cover_preview',
      '#title' => t('Cover Static Preview'),
      '#size' => 20,
      '#description' => t('Files must be less than 1MB. Allowed file types png jpg jpeg'),
	    '#upload_validators'  => array(
		    'file_validate_extensions' => array('png jpg jpeg'),
		    'file_validate_size' => array(1000000),
	    ),
      '#upload_location' => 'public://cover_preview/',
    );
    $form['climax_preview'] = array(
      '#type' => 'managed_file',
      '#name' => 'climax_preview',
      '#title' => t('Climax Static Preview'),
      '#size' => 20,
      '#description' => t('Files must be less than 1MB. Allowed file types png jpg jpeg'),
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
    $form['#attached']['library'][] = 'generate_pdf/layout_form';
    $form['#theme'] = 'create_layout';
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