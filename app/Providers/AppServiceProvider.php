<?php

namespace App\Providers;

use Aws\Sdk;
use App\Services\Dynamodb;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
        /**
         * Register any application services.
         *
         * @return void
         */
        public function register()
        {                     
            $this->regDynamoDb();           
        }
        
        
        /**
         * Register Dynamo Db service
         */
        public function regDynamoDb()
        {
            list($region, $version, $endpoint, $credential) = $this->getAwsConfig();
                
            $sdk = $this->createSdk($region, $version, $endpoint, $credential) ;
            
            $this->app->singleton('app.aws.dynamodb', function($app)  use($sdk) {
                
                return new Dynamodb($sdk);                
            });
            
        }
    
        /**
         * Get Aws Configs
         * 
         * @return array
         */
        protected function getAwsConfig()
        {
            return [
                
                getenv('AWS_REGION'),
                getenv('AWS_VERSION'),
                getenv('AWS_ENDPOINT'),
                (bool) getenv('AWS_CREDENTIAL'),
            ];
        }
        
        
        /**
         * Create sdk object to use Asw web services
         * 
         * @param string $region    ex: us-west-2
         * @param string $version  
         * @param string $endpoint  use in for local
         * @param bool   $credential
         * @param array  $credentials if it wants make credential to Aws 
         * @return \Aws\Sdk
         */
        protected  function createSdk($region = null, $version = 'latest', $endpoint = null, $credential=false, $credentials=null)
        {
            $params = [
                'region'        => $region,
                'version'       => $version,
                'endpoint'      => $endpoint,            
            ];
            
            $params['credentials'] = ! $credential ? $credentials : $credential;
                
            return new Sdk($params);            
        }    
    
}
