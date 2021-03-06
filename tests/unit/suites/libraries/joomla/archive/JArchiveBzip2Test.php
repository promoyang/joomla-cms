<?php
/**
 * @package     Joomla.UnitTest
 * @subpackage  Archive
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

require_once __DIR__ . '/JArchiveTestCase.php';

/**
 * Test class for JArchiveBzip2.
 * Generated by PHPUnit on 2011-10-26 at 19:34:29.
 *
 * @package     Joomla.UnitTest
 * @subpackage  Archive
 * @since       11.1
 */
class JArchiveBzip2Test extends JArchiveTestCase
{
	/**
	 * @var  JArchiveBzip2
	 */
	protected $object;

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 *
	 * @return  void
	 */
	protected function setUp()
	{
		parent::setUp();

		$this->object = new JArchiveBzip2;
	}

	/**
	 * Tests the extract Method.
	 *
	 * @return  void
	 */
	public function testExtract()
	{
		if (!JArchiveBzip2::isSupported())
		{
			$this->markTestSkipped('Bzip2 files can not be extracted.');

			return;
		}

		$this->object->extract(__DIR__ . '/logo.bz2', static::$outputPath . '/logo-bz2.png');
		$this->assertTrue(is_file(static::$outputPath . '/logo-bz2.png'));

		if (is_file(static::$outputPath . '/logo-bz2.png'))
		{
			unlink(static::$outputPath . '/logo-bz2.png');
		}
	}

	/**
	 * Tests the extract Method.
	 *
	 * @return  void
	 */
	public function testExtractWithStreams()
	{
		if (!JArchiveBzip2::isSupported())
		{
			$this->markTestSkipped('Bzip2 files can not be extracted.');

			return;
		}

		$this->object->extract(__DIR__ . '/logo.bz2', static::$outputPath . '/logo-bz2.png', array('use_streams' => true));
		$this->assertTrue(is_file(static::$outputPath . '/logo-bz2.png'));

		if (is_file(static::$outputPath . '/logo-bz2.png'))
		{
			unlink(static::$outputPath . '/logo-bz2.png');
		}
	}

	/**
	 * Tests the isSupported Method.
	 *
	 * @return  void
	 */
	public function testIsSupported()
	{
		$this->assertEquals(
			extension_loaded('bz2'),
			JArchiveBzip2::isSupported()
		);
	}
}
