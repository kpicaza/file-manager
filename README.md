In Framework - File Manager
====================

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/kpicaza/file-manager/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/kpicaza/file-manager/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/kpicaza/file-manager/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/kpicaza/file-manager/?branch=master)
[![Build Status](https://scrutinizer-ci.com/g/kpicaza/file-manager/badges/build.png?b=master)](https://scrutinizer-ci.com/g/kpicaza/file-manager/build-status/master)

File manager provides a basic system storage  for files, It uses "In Framework" [File](https://github.com/kpicaza/file) object as DTO.

It has a `SendToStorage` service to persist files in filesystem.


## Installation:

````
composer require infw/file-manager
````

## Usage:

````php
<?php

use InFw\File\BaseMimeTypeFactory;
use InFw\File\GenericFileFactory;
use InFw\File\MimeTypes;
use InFw\Size\BaseSizeFactory;
use InFw\FileManager\BasicStorage;
use InFw\FileManager\UploadToStorage;

$config = [
    'root_path' => '/var/file-storage/',
    'min_size' => 20,
    'max_size' => 140000
];

$factory = new GenericFileFactory(
    new BaseMimeTypeFactory(
        MimeTypes::IMAGES
    ),
    new BaseSizeFactory(
        $config['min_size'],
        $config['max_size']
    )
);

/** @var \InFw\FileManager\StorageInterface $filesystem */
$filesystem = new BasicStorage($config['root_path']);

$upload = new UploadToStorage($filesystem, $factory);

// Assuming your form has an input type=file field named "upload" and an input type=name named "file_name".

/** @var \InFw\File\FileInterface $file */
$file = $upload->sendToStorage($_FILES['upload'][0]['tmp_name'], $_POST['file_name']);

````
