<?php

$filePath = '';

if (!empty($_FILES)) {
    $uploadsDir = '../public/uploads';
    $error = $_FILES["formFile"]["error"];
    if ($error == UPLOAD_ERR_OK) {
        $tmpName = $_FILES["formFile"]["tmp_name"];
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileType = finfo_file($finfo, $tmpName);
        if ($fileType !== 'application/x-dosexec') {
            $fileName = basename($_FILES["formFile"]["name"]);
            $pathParts = pathinfo($fileName);
            $extensionFile = $pathParts['extension'];
            $uploadFileName = uniqid() . '.' . $extensionFile;
            $filePath = $uploadsDir . "/" . $uploadFileName;
            move_uploaded_file($tmpName, $filePath);
        }
    }
}


