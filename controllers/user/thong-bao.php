<?php

# [MODEL]
model('admin','notify');

# [HANDLE]  
if(isset($_POST['get_notify']) && $_POST['get_notify']) {
    // input
    $id_notify = $_POST['get_notify'];
    // get
    $get_notify = pdo_query_one_new(
        'SELECT * FROM notify WHERE id_notify = ? AND deleted_at IS NULL',$id_notify
    );
    if(!$get_notify) view_error(404);
    // update state view
    pdo_execute_new(
        'UPDATE notify SET state_view_notify = 1 WHERE id_notify = ?',$id_notify
    );

    route($get_notify['link_action_notify']);

}

view_error(404);