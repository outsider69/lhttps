<?php 
namespace Madeny\lhttps;
use Symfony\Component\Dotenv\Dotenv;
class Config
{

	public function __construct($domain)
	{
		$path = $this->path(); 
		$this->v3($path, $domain);
		$this->openssl($path);  

	}

	private function v3($path, $domain)
	{
		$v3 = [
		'authorityKeyIdentifier=keyid,issuer',
		'basicConstraints=CA:FALSE',
		'keyUsage = digitalSignature, nonRepudiation, keyEncipherment, dataEncipherment',
		'subjectAltName = @alt_names',
		"[alt_names]",
		"DNS.1 = {$domain}"
		];

		$str = implode("\n", $v3);
		file_put_contents($path.'/cnf/v3.ext', $str);
		
	}

	private function openssl($path)
	{
		$dotenv = new Dotenv();
		$dotenv->load(realpath(__DIR__.'/../.env'));
		$arr = [
		getenv('R'),
		getenv('D'),
		getenv('P'),
		getenv('DM'),
		getenv('DN'),
		getenv('D2'),
		getenv('COUNTRY'),
		getenv('STATE'),
		getenv('LOCALITY'),
		getenv('ORGANIZATION'),
		getenv('ORGANIZATION_UNIT'),
		getenv('EMAILADDRESS'),
		getenv('COMMONNAME')];

		$str = implode("\n", $arr);
		file_put_contents($path.'/cnf/openssl.cnf', $str);
	}

	public static function path()
	{
		$dir = __DIR__.'/../cert';
		if (!file_exists($dir)) {
			mkdir($dir);
		}
		return $dir;
	}
	
}


