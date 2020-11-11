<?php

require realpath(dirname(__FILE__)).'/aws/aws-autoloader.php';
use Aws\S3\S3Client AS s3_client;
use Aws\S3\Exception\S3Exception;
	
class S3_upload {

	public function Aws_auth($region){
		$config = array(
                'version'     => 'latest',
                'region'      => $region,
                'credentials' => array(
                    'key'    => AWS_ACCESS_KEY,  
                    'secret' => AWS_SECRET_KEY,
                    'curl.options'  => array(CURLOPT_VERBOSE => true)
                ),
            );

        return $config;
	}

	public function upload_s3($file_name,$temp_file_location,$region){

  		$auth = $this->Aws_auth($region);

        $s3 = new s3_client($auth);

        try {
            $response = $s3->putObject([
				'Bucket' => 'testingvideoupload',
				'Key'    => $file_name,
				'SourceFile' => $temp_file_location,
				'ACL'    => 'public-read'	
			]);

            return $response;

        } catch (AwsException $e) {
            return $e->getMessage();
        }
	}
}