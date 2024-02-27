<?php
use Darryldecode\Cart\Cart;

function fileUpload($fileObject, $folderName = null, $oldFilePath = null)
{
    if ($fileObject)
    {
            if (file_exists($oldFilePath))
            {
                unlink($oldFilePath);
            }
        $fileName       = rand(10, 999999999).time().'.'.$fileObject->getClientOriginalExtension();
        $fileDirectory  = 'admin/uploaded-files/'.$folderName.'/';
        $fileObject->move($fileDirectory, $fileName);
        $fileUrl        = $fileDirectory.$fileName;
    } else{
        if (isset($oldFilePath))
        {
            $fileUrl = $oldFilePath;
        } else {
            $fileUrl = null;
        }
    }
    return $fileUrl;
}

function checkIfCourseIsInCart($courseId = null)
{
    $status = 'false';
    $items = \Cart::getContent();
    foreach ($items as $item)
    {
        if ($item['id'] == $courseId)
        {
            $status = 'true';
            break;
        }
    }
    return $status;
}
