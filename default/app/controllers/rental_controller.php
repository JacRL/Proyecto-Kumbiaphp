<?php

Load::model("Payment");
Load::model("Rental");
class RentalController extends AppController
{
    public function index(){
        $this->rental= (new Rental())->find();
    }
    /////////////////////////////////////////////////////////////////////////
    public function  registro(){
        if( Input::hasPost("rental")){//preguntar si por post se envio libro
            $rental = Input::post("rental");    // recuperar valores de form


            if ((new Rental($rental))->save()) {
                Flash::info("SUCCESSFUL REGISTRATION!!");
            } else {
                Flash::error("REGISTRATION COULD NOT BE MADE!!");
            }
        }
    }
    ////////////////////////////////////////////////////////////////////////////////////////////
    public function modificar($id){
        $this->rental = (new Rental())->find($id); //recuperar el registro
        if( Input::hasPost("rental")){//verificar el envio del formulario
            $params = Input::post("rental");//recuperar parametros
            $this->rental->save($params);//actualizar el registor
            Flash::info("SUCCESSFUL MODIFY.!!");
        }
    }
    ////////////////////////////////////////////
    public function eliminar($id)
    {
        if ((new Rental)->delete((int) $id)) {
                Flash::valid('Operación exitosa');
        } else {
                Flash::error('Falló Operación');
        }

        //enrutando por defecto al index del controller
        return Redirect::to();
    }
    //////////////////////////////////////////////
    public function  ver($id){
        $this->rental = (new Rental())->find_all_by("id",$id); //recuperar el registro
        //rental
        $this->customerName = (new Rental())->getName($id);
        $this->staffName = (new Rental())->getNameStaff($id);
        $this->filmName = (new Rental())->getNameRental($id);
        $this->totRental = (new Rental())->getTotRental($id);
        $this->totRentalA = (new Rental())->getTotRentalA($id);
        $this->totRentalB = (new Rental())->getTotRentalB($id);
        $data = new Rental();
        $payments = $data->getRentalById($id);

        foreach ($payments as $g){
            $inventory_id = $g->inventory_id;
            // echo($inventory_id);
            $customer_id = $g->customer_id;
            $staff_id = $g->staff_id;
        }
        $data = new Rental();
        $fullNameCustomer = $data->getFullNameCustomerById($customer_id);
        $this->fullNameCustomer = $fullNameCustomer;

        $data = new Rental();
        $fullNameStaff = $data->getFullNameStaffById($staff_id);
        $this->fullNameStaff = $fullNameStaff;

        $data = new Rental();
        $fullNameMovie = $data->getFullNameMovieById($inventory_id);
        $this->fullNameMovie = $fullNameMovie;

        $data = new Rental();
        $fullNameStore = $data->getFullNameStoreById($inventory_id);
        $this->fullNameStore = $fullNameStore;
        $payments = $data->getExistPayment($id);
        $this->payments=$payments;
        foreach ($payments as $g){
            $resul = $g;
        }

        $mostrar=false;
        if($resul == 0){
            $mostrar=true;
        }else{
            $data = new Rental();
            $paymentsDone = $data->getPaymentByIdRental($id);
            $this->paymentsDone=$paymentsDone;
        }
        $this->mostrar=$mostrar; 
    }
    public function pago($id){
        $data = new Rental();
        $this->rental_id=$id;
        $payments = $data->getRentalById($id);

        foreach ($payments as $g){
            $customer_id = $g->customer_id;
            $staff_id = $g->staff_id;
        }
        $this->customer_id = $customer_id;
        $this->staff_id = $staff_id;
        // $this->rental_id = $rental_id;

        $data = new Rental();
        $fullNameCustomer = $data->getFullNameCustomerById($customer_id);
        // echo ($fullNameCustomer->full_name);
        $this->fullNameCustomer = $fullNameCustomer->full_name;

        $data = new Rental();
        $fullNameStaff = $data->getFullNameStaffById($staff_id);
        $this->fullNameStaff = $fullNameStaff->full_name;

        $data = new Rental();
        $costoFinal = $data->getComision($id);
        $costoFinal = $costoFinal->costoFinal;
        $costoFinal = round($costoFinal, 2);
        $this->costoFinal = $costoFinal;

        if( Input::hasPost("payment")){
            $payment = Input::post("payment");    // recuperar valores de form
            if ((new Payment($payment))->save()) {
                Flash::valid("Your payment has been registered");
            } else {
                Flash::error("Error, try again");
            }
        }


    }

}