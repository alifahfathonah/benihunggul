<?php
class Template_user
{
	protected $_ci;

	function __construct()
	{
		$this->_ci = &get_instance(); //Untuk Memanggil function load, dll dari CI. ex: $this->load, $this->model, dll
	}

	function views($template = null, $data = null)
	{
		if ($template != null) {
			// head
			$data['_meta'] 					= $this->_ci->load->view('_layout_user/_meta', $data, true);
			$data['_css'] 					= $this->_ci->load->view('_layout_user/_css', $data, true);

			// Header
			$data['_nav'] 				= $this->_ci->load->view('_layout_user/_nav', $data, true);
			$data['_header'] 				= $this->_ci->load->view('_layout_user/_header', $data, true);

			//Sidebar
			$data['_sidebar'] 				= $this->_ci->load->view('_layout_user/_sidebar', $data, true);

			//Content
			$data['_headerContent'] 	= $this->_ci->load->view('_layout_user/_headerContent', $data, true);
			$data['_mainContent'] 		= $this->_ci->load->view($template, $data, true);
			$data['_content'] 				= $this->_ci->load->view('_layout_user/_content', $data, true);

			//Footer
			$data['_footer'] 				= $this->_ci->load->view('_layout_user/_footer', $data, true);

			//JS
			$data['_js'] 					= $this->_ci->load->view('_layout_user/_js', $data, true);

			echo $data['_template'] 		= $this->_ci->load->view('_layout_user/_template', $data, true);
		}
	}
}
 