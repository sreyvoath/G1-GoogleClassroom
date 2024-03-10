<?php

require "database/database.php";
require "models/invites/invite.model.php";
require "models/signin.model.php";
$studentJoin = getMessages();
$_SESSION['number_message'] = count($studentJoin);


?>
<div class="container">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
            <div class="border-bottom border-3 border-primary">
                <p class="fs-2 mt-1 text-info">There are users invited you</p>
            </div>
            <?php
            if (count($studentJoin) == 0) { ?>
                <div class="else mt-5">
                    <div class="img d-flex justify-content-center">
                        <img src="assets/images/avatar/17.png" alt="">
                    </div>
                    <p class="d-flex justify-content-center fs-5">You doesn't have someone invited</p>
                </div>
                <?php } else {
                    $countUser = 0;
                foreach ($studentJoin as $student) {
                    $countUser += 1;
                    $_SESSION['1class_id'] = $student['class_id'];
                    $_SESSION['1user_id'] = $student['user_id'];
                    $teacherId = getUserId($student['inviter_id']) ;
                    if ($student['user_id'] == $_SESSION['user']['id']) { ?>
                        <div class="card-body shadow d-flex justify-content-between">
                            <div class="left d-flex">
                                <img src="../../assets/images/profiles/<?= $teacherId['image'] ?>" class="avatar-img rounded-circle border border-white border-3 shadow" alt="" style="width: 50px; height:50px; object-fit:cover;">
                                <div class="uerName" style="margin-left: 10px;">
                                    <h6 class="mt-2"><?= strtoupper($teacherId['name'] ) ?>: invited you to join class  [ <?= strtoupper($student['title'] )?> ] </h6>
                                    <h6 class="small"><?= $teacherId['email'] ?></h6>
                                </div>
                            </div>
                            <div class="right">
                                <div class="action">
                                    <a href="controllers/message/student_accept.controller.php?id=<?=$student['id']?>" class="btn btn-success">Accept</a>
                                    <a href="controllers/message/delete.message.controller.php?id=<?=$student['id']?>" class="btn btn-danger">Reject</a>
                                </div>
                            </div>

                        </div>
            <?php }
                }
            };
            $_SESSION['alert'] = $countUser;
             ?>
        </div>
        <div class="col-1"></div>
    </div>
</div>