GAP
===

Google Analytics PHP tracker.

Synopsis
--------

```php
<?php
$factory = new Gap_ContextFactory(
    new Gap_Request_Parameters($_GET),
    new Gap_Request_Parameters($_POST),
    new Gap_Request_Parameters($_REQUEST),
    new Gap_Request_Cookie($_COOKIE),
    new Gap_Request_ServerVariables($_SERVER)
);

$context = $factory->createContext();
$handler = new Gap_TrackingHandler_GoogleAnalytics('UA-12392004-1');
$tracker = new Gap_Tracker($handler, $context);

$tracker->trackPageview('/_tracking/registration.html');
```

License
-------

The MIT License

Author
------

Yuya Takeyama
