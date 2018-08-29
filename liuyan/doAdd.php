 <?php
    //执行留言信息添加操作
    //1.获取要添加的留言信息，并补上其他辅助信息（ip地址、添加时间）
    $title = $_POST["title"];
    $author = $_POST["author"];
    $shengfen=$_POST["shengfen"];
    $content = $_POST["content"];
    $ip = $_SERVER["REMOTE_ADDR"];
    $addtime = time();
    //2.拼装留言信息
        $ly = "{$title}##{$author}##$shengfen##{$content}##{$ip}##{$addtime}@@@";
        //echo $ly;
        //3. 将留言添加到liuyan.txt文件中
        $info = file_get_contents("liuyan.txt");
        file_put_contents("liuyan.txt", $info . $ly);
        echo "留言成功！";
//
    ?>