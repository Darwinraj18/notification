<?php


class BaseController
{
   
    public const HTTPOK = 'HTTP/1.1 200 OK';
    public const HTTP_FAILURE_ENTITY = 'HTTP/1.1 422 Unprocessable Entity';
    public const HTTP_FAILURE_INTERNAL = 'HTTP/1.1 500 Internal server error';
    public const APP_JSON = 'Content-Type: application/json';

    /**
     * __call magic method. This method will call when the controller does not exist.
     */
    public function __call($name, $arguments)
    {
        $this->sendOutput('', array('HTTP/1.1 404 Not Found'));
    }
 
    /**
     * Get URI elements. Returns an array of URI segments from the current request.
     * 
     * @return array
     */
    protected function getUriSegments()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $uri = explode( '/', $uri );
 
        return $uri;
    }
 
    /**
     * Get querystring params. Retrieves the query string parameters from the current request.
     * 
     * @return array
     */
    protected function getQueryStringParams()
    {
        return parse_str($_SERVER['QUERY_STRING'], $query);
    }

    protected function getParam($paramName,$defaultValue) // GET Parameter ?name=ibrahim
    {
        if(empty($defaultValue))
        {
            $defaultValue = null;
        }

        if(empty($_REQUEST[$paramName]))
        {
           return $defaultValue;
        } 
        else
        {
            return $_REQUEST[$paramName];
        }
    }

 
    /**
     * Send API output.
     *
     * @param mixed  $data
     * @param string $httpHeader
     */
    protected function sendOutput($data, $httpHeaders=array()) // API output back to the client. JSON format.
    {
        header_remove('Set-Cookie');
 
        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }
 
        echo $data;
        exit;
    }
}
?>