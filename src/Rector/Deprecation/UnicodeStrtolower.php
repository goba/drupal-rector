<?php

namespace DrupalRector\Rector\Deprecation;

use Rector\RectorDefinition\CodeSample;
use Rector\RectorDefinition\RectorDefinition;

/**
 * Replaces deprecated Unicode::strtolower() calls.
 *
 * See https://www.drupal.org/node/2850048 for change record.
 *
 * What is covered:
 * - Static replacement
 */
final class UnicodeStrtolower extends StaticToFunctionBase
{
    protected $deprecatedFullQualifiedClassName = 'Drupal\Component\Utility\Unicode';

    protected $deprecatedMethodName = 'strtolower';

    protected $functionName = 'mb_strtolower';


    /**
     * @inheritdoc
     */
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition('Fixes deprecated \Drupal\Component\Utility\Unicode::strtolower() calls',[
            new CodeSample(
              <<<'CODE_BEFORE'
$string = \Drupal\Component\Utility\Unicode::strtolower('example');
CODE_BEFORE
              ,
              <<<'CODE_AFTER'
$string = mb_strtolower('example');
CODE_AFTER
            )
        ]);
    }
}
