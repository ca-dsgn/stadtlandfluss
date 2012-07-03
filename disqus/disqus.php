<?php

class Disqus {

  const DISQUS_API_HOST = 'disqus.com';
  const DISQUS_API_POSTS_URL = 'api/3.0/posts/list.json';

  private $access_token;
  private $api_key;
  private $api_secret;
  private $data = NULL;
  private $error_message = array();
  private $success = false;
  private $errorCode;

  private $summary_likes = 0;
  private $summary_dislikes = 0;
  private $summary_votes = 0;
  private $posts = array();

  static public function connect($access_token, $api_key, $api_secret) {
    return new self($access_token, $api_key, $api_secret);
  }

  /**
   * Disqus contructor
   * @param  string $access_token
   * @param  string $api_key
   * @param  string $api_secret
   */
  protected function __construct($access_token, $api_key, $api_secret) {
    $this->access_token = $access_token;
    $this->api_key = $api_key;
    $this->api_secret = $api_secret;
  }

  /**
   * Get list of posts
   * @param  array  $params
   * @return array or false
   */
  public function getPosts($params = array()) {
    $params += array(
      'access_token' => $this->access_token,
      'api_key' => $this->api_key,
      'api_secret' => $this->api_secret,
    );
    try {
      $result = json_decode(Http::connect(self::DISQUS_API_HOST)->doGet(self::DISQUS_API_POSTS_URL, $params));
      $this->data = $result->response;
      $this->success = $result->code == 0;
      $this->errorCode = $result->code;
      $this->_prepareResults();
    }
    catch (Http_Exception $error) {
      echo $error->getMessage();
      
      $this->success == false;
    }
    return $this;
  }

  public function success() {
    return $this->success;
  }

  public function errorCode() {
    return $this->errorCode;
  }

  private function _prepareResults() {
    if (!$this->success) {
      return;
    }

    foreach ($this->data as $row) {
      $row->votes = $row->likes + $row->dislikes;
      $this->posts[] = $row;
      $this->summary_likes += $row->likes;
      $this->summary_dislikes += $row->dislikes;
    }
    $this->summary_votes = $this->summary_likes + $this->summary_dislikes;
  }

  private function cmp_likes($a, $b) {
    if ($a->likes == $b->likes) return 0;
    return $a->likes > $b->likes ? -1 : +1;
  }

  private function cmp_dislikes($a, $b) {
    if ($a->dislikes == $b->dislikes) return 0;
    return $a->dislikes > $b->dislikes ? -1 : +1;
  }

  private function cmp_votes($a, $b) {
    if (($a->likes + $a->dislikes) == ($b->likes + $b->dislikes)) return 0;
    return ($a->likes + $a->dislikes) > ($b->likes + $b->dislikes) ? -1 : +1;
  }

  public function getMostLikes() {
    usort($this->posts, array('Disqus', 'cmp_likes'));
    return array(
      'posts' => $this->posts,
      'summary_likes' => $this->summary_likes,
      'summary_dislikes' => $this->summary_dislikes,
      'summary_votes' => $this->summary_votes,
    );
  }

  public function getMostDislikes() {
    usort($this->posts, array('Disqus', 'cmp_dislikes'));
    return array(
      'posts' => $this->posts,
      'summary_likes' => $this->summary_likes,
      'summary_dislikes' => $this->summary_dislikes,
      'summary_votes' => $this->summary_votes,
    );
  }

  public function getMostVotes() {
    usort($this->posts, array('Disqus', 'cmp_votes'));
    return array(
      'posts' => $this->posts,
      'summary_likes' => $this->summary_likes,
      'summary_dislikes' => $this->summary_dislikes,
      'summary_votes' => $this->summary_votes,
    );
  }

  public function getData() {
    return $this->data;
  }

}

class Http_Exception extends Exception {
  const NOT_MODIFIED = 304; 
  const BAD_REQUEST = 400; 
  const NOT_FOUND = 404; 
  const NOT_ALOWED = 405; 
  const CONFLICT = 409; 
  const PRECONDITION_FAILED = 412; 
  const INTERNAL_ERROR = 500;
}

class Http {

  const HTTP  = 'http';
  const HTTPS = 'https';
  const POST   = 'POST';
  const GET    = 'GET';
  const DELETE = 'DELETE';
  const HTTP_OK = 200;
  const HTTP_CREATED = 201;
  const HTTP_ACEPTED = 202;

  private $_host = null;
  private $_port = null;
  private $_user = null;
  private $_pass = null;
  private $_protocol = null;
  private $_headers = array();
  private $_requests = array();

  /**
   * Factory of the class. Lazy connect
   *
   * @param string $host
   * @param integer $port
   * @param string $user
   * @param string $pass
   * @return Http
   */
  static public function connect($host, $port = 80, $protocol = self::HTTP) {
    return new self($host, $port, $protocol, false);
  }

  protected function __construct($host, $port, $protocol) {
    $this->_host = $host;
    $this->_port = $port;
    $this->_protocol = $protocol;
  }

  /**
   * Builds absolute url 
   *
   * @param unknown_type $url
   * @return unknown
   */
  private function _url($url = null) {
    return "{$this->_protocol}://{$this->_host}:{$this->_port}/{$url}";
  }

  /**
   * setHeaders
   *
   * @param array $headers
   * @return Http
   */
  public function setHeaders($headers) {
    $this->_headers = $headers;
    return $this;
  }

  /**
   * @param string $url
   * @param array $params
   * @return Http
   */
  public function post($url, $params = array()) {
    $this->_requests[] = array(self::POST, $this->_url($url), $params);
    return $this;
  }

  /**
   * @param string $url
   * @param array $params
   * @return Http
   */
  public function get($url, $params = array()) {
    $this->_requests[] = array(self::GET, $this->_url($url), $params);
    return $this;
  }

  /**
   * POST request
   *
   * @param string $url
   * @param array $params
   * @return string
   */
  public function doPost($url, $params = array()) {
    return $this->_exec(self::POST, $this->_url($url), $params);
  }

  /**
   * GET Request
   *
   * @param string $url
   * @param array $params
   * @return string
   */
  public function doGet($url, $params = array()) {
    return $this->_exec(self::GET, $this->_url($url), $params);
  }

  /**
   * Performing the real request
   *
   * @param string $type
   * @param string $url
   * @param array $params
   * @return string
   */
  private function _exec($type, $url, $params = array()) {
    $headers = $this->_headers;
    $s = curl_init();
    
    if (!is_null($this->_user)) {
      curl_setopt($s, CURLOPT_USERPWD, $this->_user . ':' . $this->_pass);
    }

    switch ($type) {
      case self::POST:
        curl_setopt($s, CURLOPT_URL, $url);
        curl_setopt($s, CURLOPT_POST, true);
        curl_setopt($s, CURLOPT_POSTFIELDS, $params);
        break;
      case self::GET:
        curl_setopt($s, CURLOPT_URL, $url . '?' . http_build_query($params, '', '&'));
        break;
    }

    curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($s, CURLOPT_HTTPHEADER, $headers);
    $_out = curl_exec($s);
    $status = curl_getinfo($s, CURLINFO_HTTP_CODE);
    curl_close($s);

    switch ($status) {
      case self::HTTP_OK:
      case self::HTTP_CREATED:
      case self::HTTP_ACEPTED:
        $out = $_out;
        break;
      default:
        $disqus_error = json_decode($_out);
        throw new Http_Exception("http error: {$status} - {$disqus_error->response} (code: {$disqus_error->code})", $status);
    }
    return $out;
  }

}