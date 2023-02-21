# Simple mockery performance issue testcase

Test-Code for triggering the performance issues with phpunit 10.

## Setup

- `composer install`

## Run

- `./vendor/bin/phpunit tests`

## Stack trace

```text
#0 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Event/Emitter/DispatchingEmitter.php(409): PHPUnit\Framework\Constraint\IsIdentical->toString()
#1 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Framework/Assert.php(1814): PHPUnit\Event\DispatchingEmitter->testAssertionSucceeded(Array, Object(PHPUnit\Framework\Constraint\IsIdentical), '')
#2 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Framework/Assert.php(953): PHPUnit\Framework\Assert::assertThat(Array, Object(PHPUnit\Framework\Constraint\IsIdentical), '')
#3 /src/github/mockery-performance-issue/tests/SomeClassTest.php(30): PHPUnit\Framework\Assert::assertSame(Array, Array)
#4 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Framework/TestCase.php(1030): SomeClassTest->testDoSomethingDoes()
#5 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Framework/TestCase.php(627): PHPUnit\Framework\TestCase->runTest()
#6 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Framework/TestRunner.php(101): PHPUnit\Framework\TestCase->runBare()
#7 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Framework/TestCase.php(456): PHPUnit\Framework\TestRunner->run(Object(SomeClassTest))
#8 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Framework/TestSuite.php(352): PHPUnit\Framework\TestCase->run()
#9 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/Framework/TestSuite.php(352): PHPUnit\Framework\TestSuite->run()
#10 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/TextUI/TestRunner.php(63): PHPUnit\Framework\TestSuite->run()
#11 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/src/TextUI/Application.php(142): PHPUnit\TextUI\TestRunner->run(Object(PHPUnit\TextUI\Configuration\Configuration), Object(PHPUnit\Runner\ResultCache\DefaultResultCache), Object(PHPUnit\Framework\TestSuite))
#12 /src/github/mockery-performance-issue/vendor/phpunit/phpunit/phpunit(90): PHPUnit\TextUI\Application->run(Array)
#13 /src/github/mockery-performance-issue/vendor/bin/phpunit(123): include('...')
```

## Event Payload

The following payload is created for phpunits internal event emitter in case of a successful assertion.

```text
string(40452) "is identical to Array &0 (
    0 => Mockery_0_SomeOtherClass Object #362 (
        '_mockery_expectations' => Array &1 (
            'foo' => Mockery\ExpectationDirector Object #377 (
                '_name' => 'foo'
                '_mock' => Mockery_0_SomeOtherClass Object #362
                '_expectations' => Array &2 (
                    0 => Mockery\Expectation Object #112 (
                        '_mock' => Mockery_0_SomeOtherClass Object #362
                        '_name' => 'foo'
                        '_because' => null
                        '_expectedArgs' => Array &3 (
                            0 => Mockery\Matcher\NoArgs Object #372 (
                                '_expected' => null
                            )
                        )
                        '_countValidators' => Array &4 (
                            'Mockery\CountValidator\Exact' => Mockery\CountValidator\Exact Object #113 (
                                '_expectation' => Mockery\Expectation Object #112
                                '_limit' => 1
                            )
                        )
                        '_countValidatorClass' => 'Mockery\CountValidator\Exact'
                        '_actualCount' => 1
                        '_returnValue' => null
                        '_returnQueue' => Array &5 (
                            0 => Array &6 (
                                0 => Mockery_0_SomeOtherClass Object #362
                            )
                        )
                        '_closureQueue' => Array &7 ()
                        '_setQueue' => Array &8 ()
                        '_orderNumber' => null
                        '_globalOrderNumber' => null
                        '_throw' => false
                        '_globally' => false
                        '_passthru' => false
                    )
                )
                '_expectedOrder' => null
                '_defaults' => Array &9 ()
            )
        )
        '_mockery_expectations_count' => 0
        '_mockery_ignoreMissing' => false
        '_mockery_ignoreMissingRecursive' => false
        '_mockery_deferMissing' => false
        '_mockery_verified' => false
        '_mockery_name' => null
        '_mockery_allocatedOrder' => 0
        '_mockery_currentOrder' => 0
        '_mockery_groups' => Array &10 ()
        '_mockery_container' => Mockery\Container Object #73 (
            '_mocks' => Array &11 (
                'Mockery_0_SomeOtherClass' => Mockery_0_SomeOtherClass Object #362
            )
            '_allocatedOrder' => 0
            '_currentOrder' => 0
            '_groups' => Array &12 ()
            '_generator' => Mockery\Generator\CachingGenerator Object #385 (
                'generator' => Mockery\Generator\StringManipulationGenerator Object #8 (
                    'passes' => Array &13 (
                        0 => Mockery\Generator\StringManipulation\Pass\CallTypeHintPass Object #80 ()
                        1 => Mockery\Generator\StringManipulation\Pass\MagicMethodTypeHintsPass Object #76 (
                            'mockMagicMethods' => Array &14 (
                                0 => '__construct'
                                1 => '__destruct'
                                2 => '__call'
                                3 => '__callStatic'
                                4 => '__get'
                                5 => '__set'
                                6 => '__isset'
                                7 => '__unset'
                                8 => '__sleep'
                                9 => '__wakeup'
                                10 => '__toString'
                                11 => '__invoke'
                                12 => '__set_state'
                                13 => '__clone'
                                14 => '__debugInfo'
                            )
                        )
                        2 => Mockery\Generator\StringManipulation\Pass\ClassPass Object #75 ()
                        3 => Mockery\Generator\StringManipulation\Pass\TraitPass Object #410 ()
                        4 => Mockery\Generator\StringManipulation\Pass\ClassNamePass Object #26 ()
                        5 => Mockery\Generator\StringManipulation\Pass\InstanceMockPass Object #21 ()
                        6 => Mockery\Generator\StringManipulation\Pass\InterfacePass Object #409 ()
                        7 => Mockery\Generator\StringManipulation\Pass\AvoidMethodClashPass Object #384 ()
                        8 => Mockery\Generator\StringManipulation\Pass\MethodDefinitionPass Object #383 ()
                        9 => Mockery\Generator\StringManipulation\Pass\RemoveUnserializeForInternalSerializableClassesPass Object #382 ()
                        10 => Mockery\Generator\StringManipulation\Pass\RemoveBuiltinMethodsThatAreFinalPass Object #381 (
                            'methods' => Array &15 (
                                '__wakeup' => '/public function __wakeup\(\)\s+\{.*?\}/sm'
                                '__toString' => '/public function __toString\(\)\s+(:\s+string)?\s*\{.*?\}/sm'
                            )
                        )
                        11 => Mockery\Generator\StringManipulation\Pass\RemoveDestructorPass Object #380 ()
                        12 => Mockery\Generator\StringManipulation\Pass\ConstantsPass Object #379 ()
                    )
                )
                'cache' => Array &16 (
                    'd4b835f2feffdda1acdda8edc0822e0d' => Mockery\Generator\MockDefinition Object #365 (
                        'config' => Mockery\Generator\MockConfiguration Object #373 (
                            'targetClass' => Mockery\Generator\DefinedTargetClass Object #370 (
                                'rfc' => ReflectionClass Object #369 (
                                    'name' => 'SomeOtherClass'
                                )
                                'name' => 'SomeOtherClass'
                            )
                            'targetClassName' => '\SomeOtherClass'
                            'targetInterfaces' => Array &17 ()
                            'targetInterfaceNames' => Array &18 ()
                            'targetTraits' => Array &19 ()
                            'targetTraitNames' => Array &20 ()
                            'targetObject' => null
                            'name' => 'Mockery_0_SomeOtherClass'
                            'blackListedMethods' => Array &21 (
                                0 => '__call'
                                1 => '__callStatic'
                                2 => '__clone'
                                3 => '__wakeup'
                                4 => '__set'
                                5 => '__get'
                                6 => '__toString'
                                7 => '__isset'
                                8 => '__destruct'
                                9 => '__debugInfo'
                                10 => '__halt_compiler'
                                30 => 'empty'
                                37 => 'eval'
                                53 => 'isset'
                                70 => 'unset'
                            )
                            'whiteListedMethods' => Array &22 ()
                            'instanceMock' => false
                            'parameterOverrides' => Array &23 ()
                            'allMethods' => Array &24 (
                                0 => Mockery\Generator\Method Object #366 (
                                    'method' => ReflectionMethod Object #367 (
                                        'name' => 'foo'
                                        'class' => 'SomeOtherClass'
                                    )
                                )
                            )
                            'mockOriginalDestructor' => true
                            'constantsMap' => Array &25 ()
                        )
                        'code' => '<?php\n
/**\n
 * Mockery\n
 *\n
 * LICENSE\n
 *\n
 * This source file is subject to the new BSD license that is bundled\n
 * with this package in the file LICENSE.txt.\n
 * It is also available through the world-wide-web at this URL:\n
 * http://github.com/padraic/mockery/blob/master/LICENSE\n
 * If you did not receive a copy of the license and are unable to\n
 * obtain it through the world-wide-web, please send an email\n
 * to padraic@php.net so we can send you a copy immediately.\n
 *\n
 * @category   Mockery\n
 * @package    Mockery\n
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)\n
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License\n
 */\n
\n
\n
\n
use Mockery\Exception\BadMethodCallException;\n
use Mockery\ExpectsHigherOrderMessage;\n
use Mockery\HigherOrderMessage;\n
use Mockery\LegacyMockInterface;\n
use Mockery\MockInterface;\n
use Mockery\Reflector;\n
\n
class Mockery_0_SomeOtherClass extends \SomeOtherClass implements MockInterface\n
{\n
    /**\n
     * Stores an array of all expectation directors for this mock\n
     *\n
     * @var array\n
     */\n
    protected $_mockery_expectations = array();\n
\n
    /**\n
     * Stores an initial number of expectations that can be manipulated\n
     * while using the getter method.\n
     *\n
     * @var int\n
     */\n
    protected $_mockery_expectations_count = 0;\n
\n
    /**\n
     * Flag to indicate whether we can ignore method calls missing from our\n
     * expectations\n
     *\n
     * @var bool\n
     */\n
    protected $_mockery_ignoreMissing = false;\n
\n
    /**\n
     * Flag to indicate whether we want to set the ignoreMissing flag on\n
     * mocks generated form this calls to this one\n
     *\n
     * @var bool\n
     */\n
    protected $_mockery_ignoreMissingRecursive = false;\n
\n
    /**\n
     * Flag to indicate whether we can defer method calls missing from our\n
     * expectations\n
     *\n
     * @var bool\n
     */\n
    protected $_mockery_deferMissing = false;\n
\n
    /**\n
     * Flag to indicate whether this mock was verified\n
     *\n
     * @var bool\n
     */\n
    protected $_mockery_verified = false;\n
\n
    /**\n
     * Given name of the mock\n
     *\n
     * @var string\n
     */\n
    protected $_mockery_name = null;\n
\n
    /**\n
     * Order number of allocation\n
     *\n
     * @var int\n
     */\n
    protected $_mockery_allocatedOrder = 0;\n
\n
    /**\n
     * Current ordered number\n
     *\n
     * @var int\n
     */\n
    protected $_mockery_currentOrder = 0;\n
\n
    /**\n
     * Ordered groups\n
     *\n
     * @var array\n
     */\n
    protected $_mockery_groups = array();\n
\n
    /**\n
     * Mock container containing this mock object\n
     *\n
     * @var \Mockery\Container\n
     */\n
    protected $_mockery_container = null;\n
\n
    /**\n
     * Instance of a core object on which methods are called in the event\n
     * it has been set, and an expectation for one of the object's methods\n
     * does not exist. This implements a simple partial mock proxy system.\n
     *\n
     * @var object\n
     */\n
    protected $_mockery_partial = null;\n
\n
    /**\n
     * Flag to indicate we should ignore all expectations temporarily. Used\n
     * mainly to prevent expectation matching when in the middle of a mock\n
     * object recording session.\n
     *\n
     * @var bool\n
     */\n
    protected $_mockery_disableExpectationMatching = false;\n
\n
    /**\n
     * Stores all stubbed public methods separate from any on-object public\n
     * properties that may exist.\n
     *\n
     * @var array\n
     */\n
    protected $_mockery_mockableProperties = array();\n
\n
    /**\n
     * @var array\n
     */\n
    protected $_mockery_mockableMethods = array();\n
\n
    /**\n
     * Just a local cache for this mock's target's methods\n
     *\n
     * @var \ReflectionMethod[]\n
     */\n
    protected static $_mockery_methods;\n
\n
    protected $_mockery_allowMockingProtectedMethods = false;\n
\n
    protected $_mockery_receivedMethodCalls;\n
\n
    /**\n
     * If shouldIgnoreMissing is called, this value will be returned on all calls to missing methods\n
     * @var mixed\n
     */\n
    protected $_mockery_defaultReturnValue = null;\n
\n
    /**\n
     * Tracks internally all the bad method call exceptions that happened during runtime\n
     *\n
     * @var array\n
     */\n
    protected $_mockery_thrownExceptions = [];\n
\n
    protected $_mockery_instanceMock = true;\n
\n
    /**\n
     * We want to avoid constructors since class is copied to Generator.php\n
     * for inclusion on extending class definitions.\n
     *\n
     * @param \Mockery\Container $container\n
     * @param object $partialObject\n
     * @param bool $instanceMock\n
     * @return void\n
     */\n
    public function mockery_init(\Mockery\Container $container = null, $partialObject = null, $instanceMock = true)\n
    {\n
        if (is_null($container)) {\n
            $container = new \Mockery\Container();\n
        }\n
        $this->_mockery_container = $container;\n
        if (!is_null($partialObject)) {\n
            $this->_mockery_partial = $partialObject;\n
        }\n
\n
        if (!\Mockery::getConfiguration()->mockingNonExistentMethodsAllowed()) {\n
            foreach ($this->mockery_getMethods() as $method) {\n
                if ($method->isPublic()) {\n
                    $this->_mockery_mockableMethods[] = $method->getName();\n
                }\n
            }\n
        }\n
\n
        $this->_mockery_instanceMock = $instanceMock;\n
    }\n
\n
    /**\n
     * Set expected method calls\n
     *\n
     * @param string ...$methodNames one or many methods that are expected to be called in this mock\n
     *\n
     * @return \Mockery\ExpectationInterface|\Mockery\Expectation|\Mockery\HigherOrderMessage\n
     */\n
    public function shouldReceive(...$methodNames)\n
    {\n
        if (count($methodNames) === 0) {\n
            return new HigherOrderMessage($this, "shouldReceive");\n
        }\n
\n
        foreach ($methodNames as $method) {\n
            if ("" == $method) {\n
                throw new \InvalidArgumentException("Received empty method name");\n
            }\n
        }\n
\n
        $self = $this;\n
        $allowMockingProtectedMethods = $this->_mockery_allowMockingProtectedMethods;\n
\n
        $lastExpectation = \Mockery::parseShouldReturnArgs(\n
            $this,\n
            $methodNames,\n
            function ($method) use ($self, $allowMockingProtectedMethods) {\n
                $rm = $self->mockery_getMethod($method);\n
                if ($rm) {\n
                    if ($rm->isPrivate()) {\n
                        throw new \InvalidArgumentException("$method() cannot be mocked as it is a private method");\n
                    }\n
                    if (!$allowMockingProtectedMethods && $rm->isProtected()) {\n
                        throw new \InvalidArgumentException("$method() cannot be mocked as it is a protected method and mocking protected methods is not enabled for the currently used mock object. Use shouldAllowMockingProtectedMethods() to enable mocking of protected methods.");\n
                    }\n
                }\n
\n
                $director = $self->mockery_getExpectationsFor($method);\n
                if (!$director) {\n
                    $director = new \Mockery\ExpectationDirector($method, $self);\n
                    $self->mockery_setExpectationsFor($method, $director);\n
                }\n
                $expectation = new \Mockery\Expectation($self, $method);\n
                $director->addExpectation($expectation);\n
                return $expectation;\n
            }\n
        );\n
        return $lastExpectation;\n
    }\n
\n
    // start method allows\n
    /**\n
     * @param mixed $something  String method name or map of method => return\n
     * @return self|\Mockery\ExpectationInterface|\Mockery\Expectation|\Mockery\HigherOrderMessage\n
     */\n
    public function allows($something = [])\n
    {\n
        if (is_string($something)) {\n
            return $this->shouldReceive($something);\n
        }\n
\n
        if (empty($something)) {\n
            return $this->shouldReceive();\n
        }\n
\n
        foreach ($something as $method => $returnValue) {\n
            $this->shouldReceive($method)->andReturn($returnValue);\n
        }\n
\n
        return $this;\n
    }\n
    // end method allows\n
\n
    // start method expects\n
    /**\n
    /**\n
     * @param mixed $something  String method name (optional)\n
     * @return \Mockery\ExpectationInterface|\Mockery\Expectation|ExpectsHigherOrderMessage\n
     */\n
    public function expects($something = null)\n
    {\n
        if (is_string($something)) {\n
            return $this->shouldReceive($something)->once();\n
        }\n
\n
        return new ExpectsHigherOrderMessage($this);\n
    }\n
    // end method expects\n
\n
    /**\n
     * Shortcut method for setting an expectation that a method should not be called.\n
     *\n
     * @param string ...$methodNames one or many methods that are expected not to be called in this mock\n
     * @return \Mockery\ExpectationInterface|\Mockery\Expectation|\Mockery\HigherOrderMessage\n
     */\n
    public function shouldNotReceive(...$methodNames)\n
    {\n
        if (count($methodNames) === 0) {\n
            return new HigherOrderMessage($this, "shouldNotReceive");\n
        }\n
\n
        $expectation = call_user_func_array(array($this, 'shouldReceive'), $methodNames);\n
        $expectation->never();\n
        return $expectation;\n
    }\n
\n
    /**\n
     * Allows additional methods to be mocked that do not explicitly exist on mocked class\n
     * @param String $method name of the method to be mocked\n
     * @return Mock\n
     */\n
    public function shouldAllowMockingMethod($method)\n
    {\n
        $this->_mockery_mockableMethods[] = $method;\n
        return $this;\n
    }\n
\n
    /**\n
     * Set mock to ignore unexpected methods and return Undefined class\n
     * @param mixed $returnValue the default return value for calls to missing functions on this mock\n
     * @param bool $recursive Specify if returned mocks should also have shouldIgnoreMissing set\n
     * @return Mock\n
     */\n
    public function shouldIgnoreMissing($returnValue = null, $recursive = false)\n
    {\n
        $this->_mockery_ignoreMissing = true;\n
        $this->_mockery_ignoreMissingRecursive = $recursive;\n
        $this->_mockery_defaultReturnValue = $returnValue;\n
        return $this;\n
    }\n
\n
    public function asUndefined()\n
    {\n
        $this->_mockery_ignoreMissing = true;\n
        $this->_mockery_defaultReturnValue = new \Mockery\Undefined();\n
        return $this;\n
    }\n
\n
    /**\n
     * @return Mock\n
     */\n
    public function shouldAllowMockingProtectedMethods()\n
    {\n
        if (!\Mockery::getConfiguration()->mockingNonExistentMethodsAllowed()) {\n
            foreach ($this->mockery_getMethods() as $method) {\n
                if ($method->isProtected()) {\n
                    $this->_mockery_mockableMethods[] = $method->getName();\n
                }\n
            }\n
        }\n
\n
        $this->_mockery_allowMockingProtectedMethods = true;\n
        return $this;\n
    }\n
\n
\n
    /**\n
     * Set mock to defer unexpected methods to it's parent\n
     *\n
     * This is particularly useless for this class, as it doesn't have a parent,\n
     * but included for completeness\n
     *\n
     * @deprecated 2.0.0 Please use makePartial() instead\n
     *\n
     * @return Mock\n
     */\n
    public function shouldDeferMissing()\n
    {\n
        return $this->makePartial();\n
    }\n
\n
    /**\n
     * Set mock to defer unexpected methods to it's parent\n
     *\n
     * It was an alias for shouldDeferMissing(), which will be removed\n
     * in 2.0.0.\n
     *\n
     * @return Mock\n
     */\n
    public function makePartial()\n
    {\n
        $this->_mockery_deferMissing = true;\n
        return $this;\n
    }\n
\n
    /**\n
     * In the event shouldReceive() accepting one or more methods/returns,\n
     * this method will switch them from normal expectations to default\n
     * expectations\n
     *\n
     * @return self\n
     */\n
    public function byDefault()\n
    {\n
        foreach ($this->_mockery_expectations as $director) {\n
            $exps = $director->getExpectations();\n
            foreach ($exps as $exp) {\n
                $exp->byDefault();\n
            }\n
        }\n
        return $this;\n
    }\n
\n
    /**\n
     * Capture calls to this mock\n
     */\n
    public function __call($method, array $args)\n
    {\n
        return $this->_mockery_handleMethodCall($method, $args);\n
    }\n
\n
    public static function __callStatic($method, array $args)\n
    {\n
        return self::_mockery_handleStaticMethodCall($method, $args);\n
    }\n
\n
    /**\n
     * Forward calls to this magic method to the __call method\n
     */\n
    public function __toString()\n
    {\n
        return $this->__call('__toString', array());\n
    }\n
\n
    /**\n
     * Iterate across all expectation directors and validate each\n
     *\n
     * @throws \Mockery\CountValidator\Exception\n
     * @return void\n
     */\n
    public function mockery_verify()\n
    {\n
        if ($this->_mockery_verified) {\n
            return;\n
        }\n
        if (isset($this->_mockery_ignoreVerification)\n
            && $this->_mockery_ignoreVerification == true) {\n
            return;\n
        }\n
        $this->_mockery_verified = true;\n
        foreach ($this->_mockery_expectations as $director) {\n
            $director->verify();\n
        }\n
    }\n
\n
    /**\n
     * Gets a list of exceptions thrown by this mock\n
     *\n
     * @return array\n
     */\n
    public function mockery_thrownExceptions()\n
    {\n
        return $this->_mockery_thrownExceptions;\n
    }\n
\n
    /**\n
     * Tear down tasks for this mock\n
     *\n
     * @return void\n
     */\n
    public function mockery_teardown()\n
    {\n
    }\n
\n
    /**\n
     * Fetch the next available allocation order number\n
     *\n
     * @return int\n
     */\n
    public function mockery_allocateOrder()\n
    {\n
        $this->_mockery_allocatedOrder += 1;\n
        return $this->_mockery_allocatedOrder;\n
    }\n
\n
    /**\n
     * Set ordering for a group\n
     *\n
     * @param mixed $group\n
     * @param int $order\n
     */\n
    public function mockery_setGroup($group, $order)\n
    {\n
        $this->_mockery_groups[$group] = $order;\n
    }\n
\n
    /**\n
     * Fetch array of ordered groups\n
     *\n
     * @return array\n
     */\n
    public function mockery_getGroups()\n
    {\n
        return $this->_mockery_groups;\n
    }\n
\n
    /**\n
     * Set current ordered number\n
     *\n
     * @param int $order\n
     */\n
    public function mockery_setCurrentOrder($order)\n
    {\n
        $this->_mockery_currentOrder = $order;\n
        return $this->_mockery_currentOrder;\n
    }\n
\n
    /**\n
     * Get current ordered number\n
     *\n
     * @return int\n
     */\n
    public function mockery_getCurrentOrder()\n
    {\n
        return $this->_mockery_currentOrder;\n
    }\n
\n
    /**\n
     * Validate the current mock's ordering\n
     *\n
     * @param string $method\n
     * @param int $order\n
     * @throws \Mockery\Exception\n
     * @return void\n
     */\n
    public function mockery_validateOrder($method, $order)\n
    {\n
        if ($order < $this->_mockery_currentOrder) {\n
            $exception = new \Mockery\Exception\InvalidOrderException(\n
                'Method ' . __CLASS__ . '::' . $method . '()'\n
                . ' called out of order: expected order '\n
                . $order . ', was ' . $this->_mockery_currentOrder\n
            );\n
            $exception->setMock($this)\n
                ->setMethodName($method)\n
                ->setExpectedOrder($order)\n
                ->setActualOrder($this->_mockery_currentOrder);\n
            throw $exception;\n
        }\n
        $this->mockery_setCurrentOrder($order);\n
    }\n
\n
    /**\n
     * Gets the count of expectations for this mock\n
     *\n
     * @return int\n
     */\n
    public function mockery_getExpectationCount()\n
    {\n
        $count = $this->_mockery_expectations_count;\n
        foreach ($this->_mockery_expectations as $director) {\n
            $count += $director->getExpectationCount();\n
        }\n
        return $count;\n
    }\n
\n
    /**\n
     * Return the expectations director for the given method\n
     *\n
     * @var string $method\n
     * @return \Mockery\ExpectationDirector|null\n
     */\n
    public function mockery_setExpectationsFor($method, \Mockery\ExpectationDirector $director)\n
    {\n
        $this->_mockery_expectations[$method] = $director;\n
    }\n
\n
    /**\n
     * Return the expectations director for the given method\n
     *\n
     * @var string $method\n
     * @return \Mockery\ExpectationDirector|null\n
     */\n
    public function mockery_getExpectationsFor($method)\n
    {\n
        if (isset($this->_mockery_expectations[$method])) {\n
            return $this->_mockery_expectations[$method];\n
        }\n
    }\n
\n
    /**\n
     * Find an expectation matching the given method and arguments\n
     *\n
     * @var string $method\n
     * @var array $args\n
     * @return \Mockery\Expectation|null\n
     */\n
    public function mockery_findExpectation($method, array $args)\n
    {\n
        if (!isset($this->_mockery_expectations[$method])) {\n
            return null;\n
        }\n
        $director = $this->_mockery_expectations[$method];\n
\n
        return $director->findExpectation($args);\n
    }\n
\n
    /**\n
     * Return the container for this mock\n
     *\n
     * @return \Mockery\Container\n
     */\n
    public function mockery_getContainer()\n
    {\n
        return $this->_mockery_container;\n
    }\n
\n
    /**\n
     * Return the name for this mock\n
     *\n
     * @return string\n
     */\n
    public function mockery_getName()\n
    {\n
        return __CLASS__;\n
    }\n
\n
    /**\n
     * @return array\n
     */\n
    public function mockery_getMockableProperties()\n
    {\n
        return $this->_mockery_mockableProperties;\n
    }\n
\n
    public function __isset($name)\n
    {\n
        if (false === stripos($name, '_mockery_') && get_parent_class($this) && method_exists(get_parent_class($this), '__isset')) {\n
            return call_user_func(get_parent_class($this) . '::__isset', $name);\n
        }\n
\n
        return false;\n
    }\n
\n
    public function mockery_getExpectations()\n
    {\n
        return $this->_mockery_expectations;\n
    }\n
\n
    /**\n
     * Calls a parent class method and returns the result. Used in a passthru\n
     * expectation where a real return value is required while still taking\n
     * advantage of expectation matching and call count verification.\n
     *\n
     * @param string $name\n
     * @param array $args\n
     * @return mixed\n
     */\n
    public function mockery_callSubjectMethod($name, array $args)\n
    {\n
        if (!method_exists($this, $name) && get_parent_class($this) && method_exists(get_parent_class($this), '__call')) {\n
            return call_user_func(get_parent_class($this) . '::__call', $name, $args);\n
        }\n
        return call_user_func_array(get_parent_class($this) . '::' . $name, $args);\n
    }\n
\n
    /**\n
     * @return string[]\n
     */\n
    public function mockery_getMockableMethods()\n
    {\n
        return $this->_mockery_mockableMethods;\n
    }\n
\n
    /**\n
     * @return bool\n
     */\n
    public function mockery_isAnonymous()\n
    {\n
        $rfc = new \ReflectionClass($this);\n
\n
        // PHP 8 has Stringable interface\n
        $interfaces = array_filter($rfc->getInterfaces(), function ($i) {\n
            return $i->getName() !== 'Stringable';\n
        });\n
\n
        return false === $rfc->getParentClass() && 2 === count($interfaces);\n
    }\n
\n
    public function mockery_isInstance()\n
    {\n
        return $this->_mockery_instanceMock;\n
    }\n
\n
    public function __wakeup()\n
    {\n
        /**\n
         * This does not add __wakeup method support. It's a blind method and any\n
         * expected __wakeup work will NOT be performed. It merely cuts off\n
         * annoying errors where a __wakeup exists but is not essential when\n
         * mocking\n
         */\n
    }\n
\n
    public function __destruct()\n
    {\n
        /**\n
         * Overrides real class destructor in case if class was created without original constructor\n
         */\n
    }\n
\n
    public function mockery_getMethod($name)\n
    {\n
        foreach ($this->mockery_getMethods() as $method) {\n
            if ($method->getName() == $name) {\n
                return $method;\n
            }\n
        }\n
\n
        return null;\n
    }\n
\n
    /**\n
     * @param string $name Method name.\n
     *\n
     * @return mixed Generated return value based on the declared return value of the named method.\n
     */\n
    public function mockery_returnValueForMethod($name)\n
    {\n
        $rm = $this->mockery_getMethod($name);\n
\n
        if ($rm === null) {\n
            return null;\n
        }\n
\n
        $returnType = Reflector::getSimplestReturnType($rm);\n
\n
        switch ($returnType) {\n
            case null:     return null;\n
            case 'string': return '';\n
            case 'int':    return 0;\n
            case 'float':  return 0.0;\n
            case 'bool':   return false;\n
\n
            case 'array':\n
            case 'iterable':\n
                return [];\n
\n
            case 'callable':\n
            case '\Closure':\n
                return function () {\n
                };\n
\n
            case '\Traversable':\n
            case '\Generator':\n
                $generator = function () { yield; };\n
                return $generator();\n
\n
            case 'void':\n
                return null;\n
\n
            case 'static':\n
                return $this;\n
\n
            case 'object':\n
                $mock = \Mockery::mock();\n
                if ($this->_mockery_ignoreMissingRecursive) {\n
                    $mock->shouldIgnoreMissing($this->_mockery_defaultReturnValue, true);\n
                }\n
                return $mock;\n
\n
            default:\n
                $mock = \Mockery::mock($returnType);\n
                if ($this->_mockery_ignoreMissingRecursive) {\n
                    $mock->shouldIgnoreMissing($this->_mockery_defaultReturnValue, true);\n
                }\n
                return $mock;\n
        }\n
    }\n
\n
    public function shouldHaveReceived($method = null, $args = null)\n
    {\n
        if ($method === null) {\n
            return new HigherOrderMessage($this, "shouldHaveReceived");\n
        }\n
\n
        $expectation = new \Mockery\VerificationExpectation($this, $method);\n
        if (null !== $args) {\n
            $expectation->withArgs($args);\n
        }\n
        $expectation->atLeast()->once();\n
        $director = new \Mockery\VerificationDirector($this->_mockery_getReceivedMethodCalls(), $expectation);\n
        $this->_mockery_expectations_count++;\n
        $director->verify();\n
        return $director;\n
    }\n
\n
    public function shouldHaveBeenCalled()\n
    {\n
        return $this->shouldHaveReceived("__invoke");\n
    }\n
\n
    public function shouldNotHaveReceived($method = null, $args = null)\n
    {\n
        if ($method === null) {\n
            return new HigherOrderMessage($this, "shouldNotHaveReceived");\n
        }\n
\n
        $expectation = new \Mockery\VerificationExpectation($this, $method);\n
        if (null !== $args) {\n
            $expectation->withArgs($args);\n
        }\n
        $expectation->never();\n
        $director = new \Mockery\VerificationDirector($this->_mockery_getReceivedMethodCalls(), $expectation);\n
        $this->_mockery_expectations_count++;\n
        $director->verify();\n
        return null;\n
    }\n
\n
    public function shouldNotHaveBeenCalled(array $args = null)\n
    {\n
        return $this->shouldNotHaveReceived("__invoke", $args);\n
    }\n
\n
    protected static function _mockery_handleStaticMethodCall($method, array $args)\n
    {\n
        $associatedRealObject = \Mockery::fetchMock(__CLASS__);\n
        try {\n
            return $associatedRealObject->__call($method, $args);\n
        } catch (BadMethodCallException $e) {\n
            throw new BadMethodCallException(\n
                'Static method ' . $associatedRealObject->mockery_getName() . '::' . $method\n
                . '() does not exist on this mock object',\n
                0,\n
                $e\n
            );\n
        }\n
    }\n
\n
    protected function _mockery_getReceivedMethodCalls()\n
    {\n
        return $this->_mockery_receivedMethodCalls ?: $this->_mockery_receivedMethodCalls = new \Mockery\ReceivedMethodCalls();\n
    }\n
\n
    /**\n
     * Called when an instance Mock was created and its constructor is getting called\n
     *\n
     * @see \Mockery\Generator\StringManipulation\Pass\InstanceMockPass\n
     * @param array $args\n
     */\n
    protected function _mockery_constructorCalled(array $args)\n
    {\n
        if (!isset($this->_mockery_expectations['__construct']) /* _mockery_handleMethodCall runs the other checks */) {\n
            return;\n
        }\n
        $this->_mockery_handleMethodCall('__construct', $args);\n
    }\n
\n
    protected function _mockery_findExpectedMethodHandler($method)\n
    {\n
        if (isset($this->_mockery_expectations[$method])) {\n
            return $this->_mockery_expectations[$method];\n
        }\n
\n
        $lowerCasedMockeryExpectations = array_change_key_case($this->_mockery_expectations, CASE_LOWER);\n
        $lowerCasedMethod = strtolower($method);\n
\n
        if (isset($lowerCasedMockeryExpectations[$lowerCasedMethod])) {\n
            return $lowerCasedMockeryExpectations[$lowerCasedMethod];\n
        }\n
\n
        return null;\n
    }\n
\n
    protected function _mockery_handleMethodCall($method, array $args)\n
    {\n
        $this->_mockery_getReceivedMethodCalls()->push(new \Mockery\MethodCall($method, $args));\n
\n
        $rm = $this->mockery_getMethod($method);\n
        if ($rm && $rm->isProtected() && !$this->_mockery_allowMockingProtectedMethods) {\n
            if ($rm->isAbstract()) {\n
                return;\n
            }\n
\n
            try {\n
                $prototype = $rm->getPrototype();\n
                if ($prototype->isAbstract()) {\n
                    return;\n
                }\n
            } catch (\ReflectionException $re) {\n
                // noop - there is no hasPrototype method\n
            }\n
\n
            return call_user_func_array(get_parent_class($this) . '::' . $method, $args);\n
        }\n
\n
        $handler = $this->_mockery_findExpectedMethodHandler($method);\n
\n
        if ($handler !== null && !$this->_mockery_disableExpectationMatching) {\n
            try {\n
                return $handler->call($args);\n
            } catch (\Mockery\Exception\NoMatchingExpectationException $e) {\n
                if (!$this->_mockery_ignoreMissing && !$this->_mockery_deferMissing) {\n
                    throw $e;\n
                }\n
            }\n
        }\n
\n
        if (!is_null($this->_mockery_partial) &&\n
            (method_exists($this->_mockery_partial, $method) || method_exists($this->_mockery_partial, '__call'))\n
        ) {\n
            return call_user_func_array(array($this->_mockery_partial, $method), $args);\n
        } elseif ($this->_mockery_deferMissing && is_callable(get_parent_class($this) . '::' . $method)\n
            && (!$this->hasMethodOverloadingInParentClass() || (get_parent_class($this) && method_exists(get_parent_class($this), $method)))) {\n
            return call_user_func_array(get_parent_class($this) . '::' . $method, $args);\n
        } elseif ($this->_mockery_deferMissing && get_parent_class($this) && method_exists(get_parent_class($this), '__call')) {\n
            return call_user_func(get_parent_class($this) . '::__call', $method, $args);\n
        } elseif ($method == '__toString') {\n
            // __toString is special because we force its addition to the class API regardless of the\n
            // original implementation.  Thus, we should always return a string rather than honor\n
            // _mockery_ignoreMissing and break the API with an error.\n
            return sprintf("%s#%s", __CLASS__, spl_object_hash($this));\n
        } elseif ($this->_mockery_ignoreMissing) {\n
            if (\Mockery::getConfiguration()->mockingNonExistentMethodsAllowed() || (!is_null($this->_mockery_partial) && method_exists($this->_mockery_partial, $method)) || is_callable(get_parent_class($this) . '::' . $method)) {\n
                if ($this->_mockery_defaultReturnValue instanceof \Mockery\Undefined) {\n
                    return call_user_func_array(array($this->_mockery_defaultReturnValue, $method), $args);\n
                } elseif (null === $this->_mockery_defaultReturnValue) {\n
                    return $this->mockery_returnValueForMethod($method);\n
                }\n
\n
                return $this->_mockery_defaultReturnValue;\n
            }\n
        }\n
\n
        $message = 'Method ' . __CLASS__ . '::' . $method .\n
            '() does not exist on this mock object';\n
\n
        if (!is_null($rm)) {\n
            $message = 'Received ' . __CLASS__ .\n
                '::' . $method . '(), but no expectations were specified';\n
        }\n
\n
        $bmce = new BadMethodCallException($message);\n
        $this->_mockery_thrownExceptions[] = $bmce;\n
        throw $bmce;\n
    }\n
\n
    /**\n
     * Uses reflection to get the list of all\n
     * methods within the current mock object\n
     *\n
     * @return array\n
     */\n
    protected function mockery_getMethods()\n
    {\n
        if (static::$_mockery_methods && \Mockery::getConfiguration()->reflectionCacheEnabled()) {\n
            return static::$_mockery_methods;\n
        }\n
\n
        if (isset($this->_mockery_partial)) {\n
            $reflected = new \ReflectionObject($this->_mockery_partial);\n
        } else {\n
            $reflected = new \ReflectionClass($this);\n
        }\n
\n
        return static::$_mockery_methods = $reflected->getMethods();\n
    }\n
\n
    private function hasMethodOverloadingInParentClass()\n
    {\n
        // if there's __call any name would be callable\n
        return is_callable(get_parent_class($this) . '::aFunctionNameThatNoOneWouldEverUseInRealLife12345');\n
    }\n
\n
    /**\n
     * @return array\n
     */\n
    private function getNonPublicMethods()\n
    {\n
        return array_map(\n
            function ($method) {\n
                return $method->getName();\n
            },\n
            array_filter($this->mockery_getMethods(), function ($method) {\n
                return !$method->isPublic();\n
            })\n
        );\n
    }\n
public function foo(): array{\n
$argc = func_num_args();\n
$argv = func_get_args();\n
$ret = $this->_mockery_handleMethodCall(__FUNCTION__, $argv);\n
return $ret;\n
}\n
\n
    }\n
'
                    )
                )
            )
            '_loader' => Mockery\Loader\EvalLoader Object #378 ()
            '_namedMocks' => Array &26 ()
        )
        '_mockery_partial' => null
        '_mockery_disableExpectationMatching' => false
        '_mockery_mockableProperties' => Array &27 ()
        '_mockery_mockableMethods' => Array &28 ()
        '_mockery_allowMockingProtectedMethods' => false
        '_mockery_receivedMethodCalls' => Mockery\ReceivedMethodCalls Object #67 (
            'methodCalls' => Array &29 (
                0 => Mockery\MethodCall Object #368 (
                    'method' => 'foo'
                    'args' => Array &30 ()
                )
            )
        )
        '_mockery_defaultReturnValue' => null
        '_mockery_thrownExceptions' => Array &31 ()
        '_mockery_instanceMock' => false
    )
)"
```
