<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $dynamodb = $this->dynamodb()->newConnection();
        
        $tableName = 'products';
        
        $result = $dynamodb->createTable([
            'TableName' => $tableName,
            'AttributeDefinitions' => [
                [ 'AttributeName' => 'Id',      'AttributeType' => 'N' ],
                [ 'AttributeName' => 'Name',    'AttributeType' => 'S' ],
                //[ 'AttributeName' => 'Price',    'AttributeType' => 'N' ],
               // [ 'AttributeName' => 'Desc',    'AttributeType' => 'N' ],
                //[ 'AttributeName' => 'Tags',    'AttributeType' => 'S' ],
               // [ 'AttributeName' => 'CreatedAt', 'AttributeType' => 'N' ],
//                [ 'AttributeName' => 'UpdatedAt', 'AttributeType' => 'N' ],               
            ],
            
            'KeySchema' => [
                [ 'AttributeName' => 'Id', 'KeyType' => 'HASH' ],
                [ 'AttributeName' => 'Name', 'KeyType' => 'RANGE' ],
                //[ 'AttributeName' => 'Price', 'KeyType' => 'RANGE' ],
//                [ 'AttributeName' => 'Desc', 'KeyType' => 'RANGE' ],
//                [ 'AttributeName' => 'Tags', 'KeyType' => 'RANGE' ],
//                [ 'AttributeName' => 'CreatedAt', 'KeyType' => 'RANGE' ],
//                [ 'AttributeName' => 'UpdateAt', 'KeyType' => 'RANGE' ],
            ],
            
            'ProvisionedThroughput' => [
                'ReadCapacityUnits'    => 7, 
                'WriteCapacityUnits' => 7,
            ]
        ]);
        
                
    }
    
    /**
     * Get Dynamodb Service
     * 
     * @return \App\Services\Dynamodb
     */
    protected function dynamodb()
    {
        return \App::make('app.aws.dynamodb');
    }
   

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
