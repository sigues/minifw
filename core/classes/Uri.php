<?

class Uri{
	protected $_host;
	protected $_requestUri;

	public function __construct(){
		$this->_host = $_SERVER["HTTP_HOST"];
		$this->_requestUri = $_SERVER["REQUEST_URI"];
		$this->_base_url = "http://".$this->_host.$this->_requestUri;
	}

	public function getUri(){
		return $this->_base_url;
	}
}