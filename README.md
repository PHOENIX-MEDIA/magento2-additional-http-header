# Magento2 Additional HTTP Header
Sets additional HTTP headers in response

### What it does

The module adds a header to the HTTP response. As an example implementation is sets the full
action name of the request controller with the header "X-FULL_ACTION_NAME".
The module can be easily extended by declaring new handlers in the di.xml (can be done in
separate module). Each handler needs to implement the AdditionalHttpHeaderInterface API.
For ease of use a HandlerAbstract class implements most of what is required. 

### How to use

1. Install the module via Composer:
``` 
composer require phoenix-media/magento2-additional-http-header
```
2. Enable it
``` bin/magento module:enable Phoenix_AdditionalHttpHeader ```
3. Install the module and rebuild the DI cache
``` bin/magento cache:flush ```

### How to configure

Find the modules configuration in the PHOENIX MEDIA section of your Magento configuration.
