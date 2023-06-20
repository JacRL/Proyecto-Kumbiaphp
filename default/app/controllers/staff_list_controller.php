<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even) {
        background-color: rgba(150, 212, 212, 0.4);
    }
</style>
<?php
class StaffListController extends AppController
{
    public function index()
    {
        $this->stafflist = (new StaffList())->find();
    }
    public function nuevo()
    {
        if (Input::hasPost("staff_list")) { //Pregunto si existe
            $stafflist = Input::post("staff_list");    // recuperar valores de form
            if ((new StaffList($stafflist))->save()) {
                Flash::info("SUCCESSFUL REGISTRATION!!");
            } else {
                Flash::error("REGISTRATION COULD NOT BE MADE!!");
            }
        }
    }
    public function modificar($id)
    {
        $this->staff_list = (new StaffList())->find($id);
        if (Input::hasPost("staff_list")) { //Pregunto si existe
            $params = Input::post("staff_list");    // recuperar valores de form
            $this->staff_list->save($params);
        }
    }
}
