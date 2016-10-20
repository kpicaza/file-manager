<?php

/**
 * This file is part of InFw\FileManager package.
 */

namespace InFw\FileManager;

use InFw\File\FileInterface;
use InFw\File\FileFactoryInterface;

/**
 * Class UploadToStorage.
 */
class UploadToStorage implements UploadInterface
{
    /**
     * File storage.
     *
     * @var StorageInterface
     */
    private $storage;

    /**
     * File factory.
     *
     * @var FileFactoryInterface
     */
    private $factory;

    /**
     * UploadToStorage constructor.
     *
     * @param StorageInterface     $storage
     * @param FileFactoryInterface $factory
     */
    public function __construct(StorageInterface $storage, FileFactoryInterface $factory)
    {
        $this->storage = $storage;
        $this->factory = $factory;
    }

    /**
     * Send a file to storage.
     *
     * @param string $path
     * @param string $name
     *
     * @return FileInterface
     */
    public function sendToStorage($path, $name)
    {
        $file = $this->factory->make($name, $path);

        $this->storage->save($file);

        return $file;
    }
}
