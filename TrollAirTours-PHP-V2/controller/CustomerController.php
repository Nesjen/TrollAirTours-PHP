<?php

require_once("Controller.php");

class CustomerController extends Controller {

    /**
     * Shows all possible pages
     * @param string $page
     */
    public function show($page) {
        if ($page == "addCustomer") {
            $this->addCustomerAction();
        } else if ($page == "customers") {
            $this->showCustomersAction();
            // TODO - register additional customer pages here, and
        }
    }


    /**
     * Gets customers from CustomerModel and inserts them into customer template
     *
     * @return bool true on success
     */
    private function showCustomersAction() {
        // Get all customers from database
        /** @var CustomerModel $customerModel */
        $customerModel = $GLOBALS["customerModel"];
        $customers = $customerModel->getAll();

        // Get previously used name in the form
        $customerName = isset($_REQUEST["customerName"]) ? $_REQUEST["customerName"] : "";
        // And secure it
        $customerName = htmlspecialchars($customerName);

        // TODO - if you need additional variables for the customer page, add them to this array
        $data = array(
            "customers" => $customers,
            "customerName" => $customerName,
        );
        return $this->render("customers", $data);
    }

    private function addCustomerAction() {
        // Find "customerName" parameter in request,
        $customerName = $_REQUEST["customerName"];
        if (!$customerName) {
            // No customer name supplied, redirect to customer list
            return $this->showCustomersAction();
        }

        // Try to add new customer, Set action response code - success or not
        /** @var CustomerModel $customerModel */
        $customerModel = $GLOBALS["customerModel"];
        $added = $customerModel->add($customerName);

        // Render the page
        $data = array(
            "added" => $added,
            "customerName" => $customerName,
        );
        return $this->render("customerAdd", $data);
    }
}