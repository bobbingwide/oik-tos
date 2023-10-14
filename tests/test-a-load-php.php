<?php

/**
 * @package oik-tos
 * @copyright (C) Copyright Bobbing Wide 2023
 *
 * Unit tests to load all the PHP files for PHP 8.2
 */
class Tests_load_php extends BW_UnitTestCase
{

	/**
	 * set up logic
	 *
	 * - ensure any database updates are rolled back
	 * - we need oik-googlemap to load the functions we're testing
	 */
	function setUp(): void 	{
		parent::setUp();
	}

	function test_load_admin_php() {
		oik_require( 'admin/oik-activation.php', 'oik-tos');
		oik_require( 'admin/oik-default-tos.inc', 'oik-tos');
		oik_require( 'admin/oik-tos.php', 'oik-tos');
		$this->assertTrue( true );
	}

	function test_load_plugin() {
		oik_require( 'oik-tos.php', 'oik-tos');
		$this->assertTrue( true );

	}

}


