--TEST--
The right events are emitted in the right order for a test that uses a data provider that is not public
--SKIPIF--
<?php declare(strict_types=1);
if (DIRECTORY_SEPARATOR === '\\') {
    print "skip: this test does not work on Windows / GitHub Actions\n";
}
--FILE--
<?php declare(strict_types=1);
$traceFile = tempnam(sys_get_temp_dir(), __FILE__);

$_SERVER['argv'][] = '--do-not-cache-result';
$_SERVER['argv'][] = '--no-configuration';
$_SERVER['argv'][] = '--no-output';
$_SERVER['argv'][] = '--log-events-text';
$_SERVER['argv'][] = $traceFile;
$_SERVER['argv'][] = __DIR__ . '/_files/PrivateDataProviderTest.php';

require __DIR__ . '/../../bootstrap.php';

(new PHPUnit\TextUI\Application)->run($_SERVER['argv']);

print file_get_contents($traceFile);

unlink($traceFile);
--EXPECTF--
PHPUnit Started (PHPUnit %s using %s)
Test Runner Configured
Data Provider Method Called (PHPUnit\TestFixture\Event\PrivateDataProviderTest::values for test method PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess)
Test Triggered PHPUnit Deprecation (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess)
Data Provider method PHPUnit\TestFixture\Event\PrivateDataProviderTest::values() is not public
Data Provider Method Finished for PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess:
- PHPUnit\TestFixture\Event\PrivateDataProviderTest::values
Test Suite Loaded (2 tests)
Event Facade Sealed
Test Runner Started
Test Suite Sorted
Test Runner Execution Started (2 tests)
Test Suite Started (PHPUnit\TestFixture\Event\PrivateDataProviderTest, 2 tests)
Test Suite Started (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess, 2 tests)
Test Preparation Started (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess#0)
Test Prepared (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess#0)
Assertion Succeeded (Constraint: is true, Value: true)
Test Passed (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess#0)
Test Finished (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess#0)
Test Preparation Started (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess#1)
Test Prepared (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess#1)
Assertion Succeeded (Constraint: is true, Value: true)
Test Passed (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess#1)
Test Finished (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess#1)
Test Suite Finished (PHPUnit\TestFixture\Event\PrivateDataProviderTest::testSuccess, 2 tests)
Test Suite Finished (PHPUnit\TestFixture\Event\PrivateDataProviderTest, 2 tests)
Test Runner Execution Finished
Test Runner Finished
PHPUnit Finished (Shell Exit Code: 0)
