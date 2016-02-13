<?php

namespace tutorial\php;

error_reporting(E_ALL);
ini_set("display_errors", "stderr");

require_once 'vendor/autoload.php';
require_once __DIR__.'/vendor/apache/thrift/lib/php/lib/Thrift/ClassLoader/ThriftClassLoader.php';

use Thrift\ClassLoader\ThriftClassLoader;

$GEN_DIR = dirname(__FILE__).'/gen-php';

$loader = new ThriftClassLoader();
$loader->registerNamespace('Thrift', __DIR__ . '/vendor/apache/thrift/lib/php/lib');
$loader->registerDefinition('Example', $GEN_DIR);
$loader->register();


use Thrift\Factory\TBinaryProtocolFactory;
use Thrift\Factory\TTransportFactory;
use Thrift\Protocol\TBinaryProtocol;
use Thrift\Server\TServerSocket;
use Thrift\Server\TSimpleServer;
use Thrift\Transport\TPhpStream;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TSocket;

class ExampleService implements \Example\ExampleServiceIf {

  /**
   * @return string
   */
  public function ping()
  {
    return 'ping method called ';
  }

  /**
   * @param \Example\AuthenticateRequest $authenticateRequest
   * @return \Example\AuthenticateResponse
   * @throws \Example\ServerError\ServerError
   */
  public function authenticate(\Example\AuthenticateRequest $authenticateRequest)
  {
    // TODO: Implement authenticate() method.
  }
}

$handler = new ExampleService();
$processor = new \Example\ExampleServiceProcessor($handler);

$transport = new TServerSocket();
$server = new TSimpleServer(
    $processor,
    $transport,
    new TTransportFactory(),
    new TTransportFactory(),
    new TBinaryProtocolFactory(),
    new TBinaryProtocolFactory()
);
$server->serve();
