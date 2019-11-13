<?php
    $arr = $_FILES;
    $info = $_REQUEST;
    $ext = explode('.',$info['filename'][1]);
    $fileName = $info['filename'];
    $baseDir = "./".date("Y/m/d",time());
    if(!is_dir($baseDir)){
        mkdir($baseDir,0,777);
    }

    $filePath = $baseDir.$fileName;
    $tmpName = $arr['data']['tmp_name'];
    $comtent = file_get_contents($tmpName);
    file_put_contents($filePath,$comtent,FILE_APPEND);
    // $filePath = "/file/".$filePath;
        
        $res = array(
        'error'=>0,
        'data'=>array(
            'path'=>$filePath,
        ),
    );
    echo json_encode($res);

?>