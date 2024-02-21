<?php
$user = $_SESSION['user'];
?>
<div class="container">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-8">
            <div class="shadow-sm p-3 mb-5 bg-body rounded border-l">
                <div class="avatar p-0"  style="width: 150px">
                    <img class="rounded-circle " src="../assets/images/profiles/<?= $user['image'] ?>"  style="width: 150px" alt="avatar">
                </div>
            </div>
        </div>
        <div class="col-2"></div>
    </div>
</div>