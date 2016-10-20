<?php

/**
 * This file is part of InFw\FileManager package.
 */

namespace InFw\FileManager;

use InFw\File\FileInterface;

/**
 * Interface Upload.
 */
interface UploadInterface
{
    /**
     * Save file at file system.
     *
     * @param string $path
     * @param string $name
     *
     * @return FileInterface
     */
    public function sendToStorage($path, $name);
}
