<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($query = FALSE)
	{
		if(!$query)
		{
			$video_id = 'elvideo.de.0.0.1'; // I'm sexy and I know it youtube video ID
			$view_data['query'] = '';
			$view_data['title'] = "ElVídeo.de";
			$view_data['description'] = 'Bonitas URLs para vídeos míticos';
			$this->output->set_header("ETag: \"" . $video_id . '"');
			$this->load->view('landing', $view_data);
		}
		else
		{
			$common_pattern = 'http://gdata.youtube.com/feeds/api/videos/';
			$video_id_length = -11;
			$view_data['query'] = $query;
			$clean_query = $this->_sanitize_query($query);
			$feed = $this->_search_on_feed($clean_query);
			$xml_feed = new SimpleXMLElement($feed);
			$url = (string) $xml_feed->entry->id;
			$video_id = substr($url, $video_id_length);
// 			$view_data['title'] = (string) $xml_feed->entry->title;
			$view_data['title'] = str_replace('+', ' ', $clean_query);
			$view_data['description'] = (string) $xml_feed->entry->content;
			$view_data['video_id'] = $video_id;
			$view_data['url'] = '"https://www.youtube.com/v/' . $video_id . '?version=3&hd=1&f=videos&autoplay=1&loop=1&playlist=' . $video_id . '&modestbranding=1&controls=0"';

			$this->output->set_header("ETag: \"" . $video_id . '"');
			$this->load->view('video_player', $view_data);
		}
	}


	/**
	 * Replace possible space replacements by '+' for the youtube search
	 *
	 * @param String $query
	 *
	 * @access private
	 *
	 * @return String
	 */
	private function _sanitize_query($query)
	{
		$clean_query = str_replace('%20', '+', $query);
		$clean_query = str_replace('_', '+', $clean_query);
		$clean_query = str_replace('.', '+', $clean_query);
		return $clean_query;

	}


	/**
	 * Search on Youtube's feed api the plus the given query
	 *
	 * @param String $query The query to search for
	 *
	 * @access private
	 *
	 * @return String
	 */
	private function _search_on_feed($query)
	{
		$url = 'https://gdata.youtube.com/feeds/api/videos?max-results=1&q=' . $query;
		//$url = 'https://gdata.youtube.com/feeds/api/users/VideosCortosAPM/uploads?q=' . $query;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$data = curl_exec($ch);
		curl_close($ch);
		return $data;
	}


}

/* End of file welcome.php */
/* Location: ./application/controllers/search.php */
