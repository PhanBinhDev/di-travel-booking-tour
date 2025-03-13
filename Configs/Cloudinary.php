<?php
  require_once './Configs/Database.php';
  use Cloudinary\Configuration\Configuration;

  Configuration::instance([
  'cloud' => [
    'cloud_name' => $config['cloud_name'], 
    'api_key' => $config['api_key'], 
    'api_secret' => $config['api_secret']
  ],
  'url' => [
      'secure' => true
    ]
  ]);

?>