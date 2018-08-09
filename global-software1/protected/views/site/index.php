<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<center>
    <div style="margin-top: -1px; border: 1px solid #ccc; width: 800px; padding: 10px 5px 0 5px;">
        <form name="task_form" method="post" action="">
            <input type="hidden" name="priority" value="0">
            <table>
                <tbody>
                    <tr>
                        <td><div class="priorityButtonOff" onclick="togglePriority(this)"></div></td>
                        <!-- <td><input type="date" class="text dp-applied" name="date" id="task_date" value="Date" onclick="value=''" style="width: 55px"><a href="#" class="dp-choose-date" title="Choose date">Choose date</a></td> -->
                        <td><input id="task_date" type="date" class="text dp-applied" name="date" value=""></td>
                        <td><input id="task_note" type="text" class="text" name="note" placeholder="Enter notes here." size="50" maxlength="255"></td>
                        <td><input id="task_lqo" type="text" class="text" name="item" placeholder="LQO#" size="10"></td>
                        <td>
                            <!-- <span class="fakeSelector" id="assign_user_name">Kunal</span> -->
                            <select  id="user_id" name="user_id" multiple="multiple">
                                <option value="All Users">All Users</option>
                                <option value="18213">Chelsea</option>
                                <option value="17525">Helen</option>
                                <option value="11482">John</option>
                                <option value="18400">Kunal</option>
                                <option value="5286">Tony</option>
                            </select>
                        </td>
                        <!-- <td><span class="grayButton"><span>Add<input type="button" name="send" value="Add" onclick="addTask()"></span></span></td> -->
                        <td><input type="button" name="send" value="Add" onclick="addTask()"></td>
                    </tr>
                </tbody>
            </table>
            <!-- <input type="hidden" id="CSRFToken" name="CSRFToken" value="ce4369426e081c80c39900d6d9a671f0cbe869929fc281a5da27aca840e6458a"> -->
        </form>
        No tasks.
    </div>
</center><br><br>

<!-- <p style="text-align: center; color: #569cc8;">For more details please mail us on info@fmcsafilings.com.</p> -->

<script>
/*function addTask() {
    /*var date = document.getElementById("task_date").value;
    var note = document.getElementById("task_note").value;
    var task_lqo = document.getElementById("task_lqo").value;
    var user_id = document.getElementById("user_id").value;
    var date = $('#task_date').attr('value');
    var note = $('#task_note').attr('value');
    var task_lqo = $('#task_lqo').attr('value');
    var user_id = $('#user_id').attr('value');
    var url = 'index.php?r=site/addtask&id=__id__';
    url = url.replace('__id__', user_id);
    alert(url);
    $.ajax({
        type: "GET",
        url: url,
        data: {
            'passKey': '2424324242dsfsdfs',
        },
        success: function (data) {
            alert(data.passKey);
        }
    });
}*/
</script>