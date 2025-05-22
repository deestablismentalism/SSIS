<!DOCTYPE html>
<?php 
    include_once __DIR__ . '/../adminPages/admin_base_designs.php';
?>
 <link rel="stylesheet" href="../css/admin_all_students.css">
 <script src="../js/admin-students.js"></script>
</head>
<body>
    <div class="main-content">
        <div class="content">
            <div class="table-title">
                <div class="table-title-left"><h2> Students </h2></div>
                <div> <button class="add-student-btn"> <img src="../imgs/plus-solid.svg"></button></div>
                <div class="table-title-right">
                    <input type="text" id="search" class="search-box" placeholder="search student...">
                </div>
            </div>

            <div class="table-container">
                <table class="students">
                    <tr> 
                        <th> Student Name </th>
                        <th> Student LRN </th>
                        <th> Grade Level </th>
                        <th> Section </th>
                        <th> Student Email </th>
                        <th> Student Status </th>
                        <th> Student Actions </th>
                    </tr>
                    <tbody class="student-info">
                            <?php 
                                include_once __DIR__ . '/../server_side/adminStudentsView.php';
                                $view = new adminStudentsView();
                                $view->displayStudents();
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>