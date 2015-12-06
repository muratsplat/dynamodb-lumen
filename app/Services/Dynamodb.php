<?php

namespace App\Services;

use Aws\Sdk;

class Dynamodb
{
    
    /**
     * @var \Aws\Sdk 
     */
    protected $sdk;
    
    /**
     * Connections
     * 
     * @var array
     */
    protected $connections = [];    
    
        /**
         * 
         * @param \Aws\Sdk $sdk
         */
        public function __construct(Sdk $sdk)
        {
            $this->sdk      = $sdk;            
        }        
        
        /**
         * New DynamoDb Client
         * 
         * @return \Aws\DynamoDb\DynamoDbClient
         */
        public function newConnection()
        {           
            $this->connections[] = $this->sdk->createDynamoDb();
            
            return last($this->connections);
        }        
    
}
