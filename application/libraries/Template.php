<?php
class Template
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
			$data['_meta'] 					= $this->_ci->load->view('_layout/_meta', $data, true);
			$data['_css'] 					= $this->_ci->load->view('_layout/_css', $data, true);

			// Header
			$data['_nav'] 				= $this->_ci->load->view('_layout/_nav', $data, true);
			$data['_header'] 				= $this->_ci->load->view('_layout/_header', $data, true);

			//Sidebar
			$data['_sidebar'] 				= $this->_ci->load->view('_layout/_sidebar', $data, true);

			//Content
			$data['_headerContent'] 	= $this->_ci->load->view('_layout/_headerContent', $data, true);
			$data['_mainContent'] 		= $this->_ci->load->view($template, $data, true);
			$data['_content'] 				= $this->_ci->load->view('_layout/_content', $data, true);

			//Footer
			$data['_footer'] 				= $this->_ci->load->view('_layout/_footer', $data, true);

			//JS
			$data['_js'] 					= $this->_ci->load->view('_layout/_js', $data, true);

			echo $data['_template'] 		= $this->_ci->load->view('_layout/_template', $data, true);
		}
	}
}
 