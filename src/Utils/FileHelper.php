<?php namespace App\Utils;

final class FileHelper
{
    public static function uploadImage($request, $fileInputName, $imageLocation)
    {
        $uploadedFiles = $request->getUploadedFiles();
		$uploadedFile = $uploadedFiles[$fileInputName];

		if(empty($uploadedFile->file)) return null;
		if ($uploadedFile->getError() === UPLOAD_ERR_OK) {
			$extension = pathinfo($uploadedFile->getClientFilename(), PATHINFO_EXTENSION);
			$basename = bin2hex(random_bytes(8));
			$filename = sprintf('%s.%0.8s', $basename, $extension);
            $filename = $imageLocation . $filename;
			$uploadedFile->moveTo($filename);

			$img_url = '/' . str_replace(DIRECTORY_SEPARATOR, '/', $filename);

            return $img_url;
		}

		return null;
    }

    public static function getDefaultImageUrl($imageSetting) {
        return '/' . str_replace(DIRECTORY_SEPARATOR, '/', $imageSetting['location'] . $imageSetting['defaultName']);
    }
}
