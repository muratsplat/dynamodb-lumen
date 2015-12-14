<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Aws\Sdk;

class Dynamodb extends BaseController
{    
    
    public function connection()
    {
        $sdk = new Sdk([
           
            'region'   => 'us-west-2',
            'version'  => 'latest',
            'endpoint' => 'http://localhost:8000',
            'credentials' => false,
        ]);

        $dynamodb = $sdk->createDynamoDb();
        
        $tableName = 'users';
        $result = $dynamodb->createTable([
            'TableName' => $tableName,
            'AttributeDefinitions' => [
                [ 'AttributeName' => 'Id', 'AttributeType' => 'N' ]
            ],
            'KeySchema' => [
                [ 'AttributeName' => 'Id', 'KeyType' => 'HASH' ]
            ],
            'ProvisionedThroughput' => [
                'ReadCapacityUnits'    => 5, 
                'WriteCapacityUnits' => 6
            ]
        ]);

        print_r($result->getPath('TableDescription'));
        
    }
    
    
    
}
