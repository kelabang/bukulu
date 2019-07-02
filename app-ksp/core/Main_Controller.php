<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main_Controller extends CI_Controller
{
  function __construct()
  {
    parent::__construct();
    $finalRender = array(
      'head' => null,
      'body' => null
    );
  }

  protected function render ($toRender = '') {
    $head = $this->load->view('base/html-header', '', true);
    // generate body
    $body = '';
    if (!empty($toRender)) {
      $toRender = join(" ", $toRender);
      $body .= $toRender;
    }
    $body.= $this->load->view('form/book-form-input', '',true);
    $jsplugin = $this->load->view('base/base-js-plugin', '',true);
    $jsarea = $this->load->view('base/base-js-area', '',true);
    $finalRender = array(
      'head' => $head,
      'body' => $body,
      'jsarea' => $jsarea,
      'jsplugin' => $jsplugin,
    );
    $this->load->view('base/html-skeleton', $finalRender);
  }

  protected function request() {
    $post_body = $this->_outputRaw();
    if(is_null($post_body)):
      $post_body = $_POST;
    endif;
    $output = array(
      'body' => $post_body,
      'query' => $_GET,
    );
    return $output;
  }

  protected function response ($toResponse) {
    $defaultResponse = array(
      'message' => 'response is empty'
    );
    if(empty($toResponse)) {
      $outputResponse = $defaultResponse;
    } else {
      $outputResponse = $toResponse;
    }
    $this->output
        ->set_content_type('application/json')
        ->set_output(json_encode($outputResponse));
  }

  private function _outputRaw () {
    $contenttype = $_SERVER['CONTENT_TYPE'];
    $post_body = file_get_contents('php://input');
    $output = null;
    if($contenttype == 'application/json'):
      $output = json_decode($post_body, true);
    endif;
    return $output;
  }


}