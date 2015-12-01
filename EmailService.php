<?php

class CreateEmailAndSend {

    public $emailTo; // string
    public $subject; // string
    public $body; // string

}

class CreateEmailAndSendResponse {

    public $CreateEmailAndSendResult; // boolean

}

class char {
    
}

class duration {
    
}

class guid {
    
}

/**
 * EmailService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class EmailService extends SoapClient {

    private static $classmap = array(
        'CreateEmailAndSend' => 'CreateEmailAndSend',
        'CreateEmailAndSendResponse' => 'CreateEmailAndSendResponse',
        'char' => 'char',
        'duration' => 'duration',
        'guid' => 'guid',
    );

    public function EmailService($wsdl = "http://3rdsemesterproject.cloudapp.net/EmailService.svc?singleWsdl", $options = array()) {
        foreach (self::$classmap as $key => $value) {
            if (!isset($options['classmap'][$key])) {
                $options['classmap'][$key] = $value;
            }
        }
        parent::__construct($wsdl, $options);
    }

    /**
     *  
     *
     * @param CreateEmailAndSend $parameters
     * @return CreateEmailAndSendResponse
     */
    public function CreateEmailAndSend(CreateEmailAndSend $parameters) {
        return $this->__soapCall('CreateEmailAndSend', array($parameters), array(
                    'uri' => 'http://tempuri.org/',
                    'soapaction' => ''
                        )
        );
    }

}

?>
