<?php
class CustomerListcontroller extends AppController
{
    public function index()
    {
        $this->customerlist = (new CustomerList())->find();
    }
    public function nuevo()
    {
        if (Input::hasPost("customer_list")) { //Pregunto si existe
            $customerlist = Input::post("customer_list");    // recuperar valores de form

            if ((new CustomerList($customerlist))->save()) {
                Flash::info("Cliente creado");
            } else {
                Flash::error("No fue posible crear al Cliente");
            }
        }
    }
    public function modificar($id)
    {
        $this->customer_list = (new CustomerList())->find($id);
        if (Input::hasPost("customer_list")) { //Pregunto si existe
            $params = Input::post("customer_list");    // recuperar valores de form
            $this->customer_list->save($params);
        }
    }
}