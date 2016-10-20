<?php

/**
 * This file is part of InFw\FileManager package.
 */

namespace InFw\FileManager;

use InFw\File\FileInterface;

/**
 * Interface Storage.
 */
interface StorageInterface
{
    /**
     * Save file in storage.
     *
     * @param FileInterface $file
     *
     * @return bool
     */
    public function save(FileInterface $file);
}
