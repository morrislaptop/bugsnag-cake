<?php
Bugsnag::register(Configure::read('Bugsnag.apiKey'));
class BugsnagError extends ErrorHandler
{
    public static function handleError($code, $description, $file = null, $line = null, $context = null) 
    {
    	// Call Bugsnag
		Bugsnag::errorHandler($code, $description, $file, $line, $context);
        
        // Fall back to cake
        return parent::handleError($code, $description, $file, $line, $context);
    }
    
    public static function handleException(Exception $exception) 
    {
    	// Call Bugsnag
		Bugsnag::exceptionHandler($exception);

    	// Fall back to Cake..
		return parent::handleException($exception);
    }
}