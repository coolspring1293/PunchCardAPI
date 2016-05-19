<?php
return array(
    'Status\\V1\\Rpc\\Ping\\Controller' => array(
        'description' => 'Ping the API',
        'GET' => array(
            'description' => 'Ping the api for acknowledge.',
            'response' => '{
   "ack": "Acknowledge the request with a timestamp."
}',
        ),
    ),
    'Status\\V1\\Rest\\Status\\Controller' => array(
        'description' => 'Status API',
        'collection' => array(
            'description' => 'status msgs',
            'GET' => array(
                'description' => 'retire',
                'response' => '{
   "_links": {
       "self": {
           "href": "/status"
       },
       "first": {
           "href": "/status?page={page}"
       },
       "prev": {
           "href": "/status?page={page}"
       },
       "next": {
           "href": "/status?page={page}"
       },
       "last": {
           "href": "/status?page={page}"
       }
   }
   "_embedded": {
       "status": [
           {
               "_links": {
                   "self": {
                       "href": "/status[/:status_id]"
                   }
               }
              "message": "A status message of no more than 140 characters",
              "user": "The user submitting the status message.",
              "timestamp": "The timestamp when the status message was last modified."
           }
       ]
   }
}',
            ),
        ),
        'entity' => array(
            'description' => 'status msg of entity',
            'GET' => array(
                'response' => '{
   "_links": {
       "self": {
           "href": "/status[/:status_id]"
       }
   }
   "message": "A status message of no more than 140 characters",
   "user": "The user submitting the status message.",
   "timestamp": "The timestamp when the status message was last modified."
}',
                'description' => 'get status',
            ),
        ),
    ),
);
