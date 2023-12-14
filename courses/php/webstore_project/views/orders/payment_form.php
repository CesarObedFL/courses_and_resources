<h2>Payment Form</h2>

<form action="index.php?controller=Order&action=confirm" method="POST">
    <h4>Shipping Address</h4>

    <label for="country">Country:</label>
    <input type="text" name="country">

    <label for="state">State:</label>
    <input type="text" name="state">

    <label for="address">Address:</label>
    <input type="text" name="address">

    <label for="subtotal">Subtotal: </label>
    <label for="total">Total: </label>

    <input type="submit" value="confirm">
</form>

