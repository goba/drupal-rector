<?php

namespace DrupalRector\Rector\Deprecation;

use Rector\RectorDefinition\CodeSample;
use Rector\RectorDefinition\RectorDefinition;

/**
 * Replaces deprecated FILE_CREATE_DIRECTORY constant use.
 *
 * No change record found.
 *
 * What is covered:
 * - Fully qualified class name replacement
 *
 * Improvement opportunities
 * - Add a use statement
 */
final class FileCreateDirectoryRector extends ConstantToClassConstantBase
{
    protected $deprecatedConstant = 'FILE_CREATE_DIRECTORY';

    protected $constantFullyQualifiedClassName = 'Drupal\Core\File\FileSystemInterface';

    protected $constant = 'CREATE_DIRECTORY';


    /**
     * @inheritdoc
     */
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition('Fixes deprecated FILE_CREATE_DIRECTORY use',[
            new CodeSample(
              <<<'CODE_BEFORE'
$result = \Drupal::service('file_system')->prepareDirectory($directory, FILE_CREATE_DIRECTORY);
CODE_BEFORE
              ,
              <<<'CODE_AFTER'
$result = \Drupal::service('file_system')->prepareDirectory($directory, \Drupal\Core\File\FileSystemInterface::CREATE_DIRECTORY);
CODE_AFTER
            )
        ]);
    }
}
