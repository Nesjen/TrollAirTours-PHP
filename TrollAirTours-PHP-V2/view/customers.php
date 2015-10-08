<?php
//////////////////////////////////////////
// Template for customer listing page
//////////////////////////////////////////

// TODO - initialize necessary variables here (remember to pass them in the controller's render() function)
// Expected variables:
// $customers - list of all customers
// $customerName - last value used in "Add customer" form
$customers = $GLOBALS["customers"];
$customerName = $GLOBALS["customerName"];
?>

<h1>Customer page</h1>

<div class="row">

    <!-- Listing all customers -->
    <div class="col-md-6">
        <h2>List existing customers</h2>
        <p>Total number of customers: <?=count($customers);?></p>
        <? if (!empty($customers)) { ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Name</th>
            </tr>
            </thead>
            <tbody>
            <? foreach ($customers as $customer) { ?>
                <tr>
                    <td><?=$customer["name"];?></td>
                    <!-- TODO - add a link to edit customer name here -->
                    <!-- TODO - add a link to delete customer here -->
                </tr>
            <? } ?>
            </tbody>
        </table>
        <? }?>
    </div>

    <!-- Adding a new customer -->
    <div class="col-md-6">
        <h2>Add a new customer</h2>
        <div class="row">
            <div class="col-sm-6">
                <form action="?page=addCustomer" method="post">
                    <div class="form-group">
                        <label for="inputName" class="sr-only">Name</label>
                        <input type="text" name="customerName" class="form-control" placeholder="Name"
                               value="<?=$customerName;?>" required>
                    </div>
                    <button class="btn btn-default" type="submit">Add</button>
                </form>
            </div>
        </div>
    </div>

</div>

<div class="row" style="margin-top: 50px;">
    <div class="col-lg-12">
        <p>Go back to <a href="?page=home">Home page</a></p>
    </div>
</div>