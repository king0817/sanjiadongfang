<html>
<head>
    <title>留言板</title>
    <link rel="stylesheet" href="dist/css/bootstrap.min.css">
    <script>
        function dodel(id) {
            if (confirm("确定要删除么？")) {
                window.location = 'del.php?id=' + id;
            }
        }
    </script>
</head>
<body>
<center>
    <div style="font-size:30px;color:red;">CoCo都可</div>
    <br/>
    <div class="container">
        <table class="table">
            <tr>
                <th width="10%">姓名</th>
                <th width="10%">电话</th>
                <th width="10%">邮箱</th>
                <th width="10%">地址</th>
                <th width="35%">留言内容</th>
                <th width="10%">IP地址</th>
                <th width="10%">留言时间</th>
                <th width="5%">操作</th>
            </tr>
            <?php
            // 获取留言信息，解析后输出到表格中
            // 1.从留言liuyan.txt中获取留言信息
            $info = file_get_contents("liuyan.txt");
            // 2.去除留言内容最后的三个@@@符号
            $info = rtrim($info, "@");

            if (strlen($info) >= 8) {
                // 3.以@@@符号拆分留言信息为一条一条的（将留言信息以@@@符号拆分成留言数组）
                $lylist = explode("@@@", $info);

                // 4.遍历留言信息数组，对每条留言做再次解析；
                foreach ($lylist as $k => $v) {
                    $ly = explode("##", $v);
                    echo "<tr>";
                    echo "<td>{$ly[0]}</td>";
                    echo "<td>{$ly[1]}</td>";
                    echo "<td>{$ly[2]}</td>";
                    echo "<td>{$ly[3]}</td>";
                    echo "<td>{$ly[4]}</td>";
                    echo "<td>{$ly[5]}</td>";
                    echo "<td>" . date("Y-m-d H:i:s", $ly[5]) . "</td>";
                    echo "<td><a href = 'javascript:dodel({$k})'>删除</a></td>";

                }
            }

            ?>
    </div>
</center>

</body>
</html>