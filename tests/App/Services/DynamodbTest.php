<?php

class DynamodbTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInjectedService()
    {
        $dynamoDb = $this->app->make('app.aws.dynamodb');
        
        $this->assertNotNull($dynamoDb);
        
        $this->assertInstanceOf('\App\Services\Dynamodb', $dynamoDb);
    }
    
    /**
     * Get DynamoDb Object
     * 
     * @return \App\Services\Dynamodb 
     */
    public function getDynamoDb()
    {
        return $this->app->make('app.aws.dynamodb');        
    }   
}
