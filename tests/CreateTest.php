<?php

declare(strict_types=1);
use PHPUnit\Framework\TestCase;
// use Path\Create;
class CreateTest extends TestCase {

	/** @test */
<<<<<<< HEAD
	public function single_create_command () {

	exec("php lh create test.dev", $output, $error);

	$this->assertEquals(0, $error);

	}

}
=======
	public function create_test() {

		exec("php lh create test.dev", $output, $error);


		var_dump($error);

		$this->assertEquals(1, $error());

		
	} 
}
>>>>>>> 8551acea69fff97acb96d2b8be229c5c4e054f11
