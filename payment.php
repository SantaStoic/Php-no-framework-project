
<?php include('layouts/header.php'); ?>

<?php

 

 if(isset($_POST['order_pay_btn'])){
  $order_status = $_POST['order_status'];
  $order_total_price = $_POST['order_total_price'];
 }

?>



    <!-- Payment -->
    <section class="my-5 py-5">
      <div class="container text-center mt-3 pt-5">
        <h2 class="form-weight-bold">Payment</h2>
        <hr class="mx-auto" />
      </div>
      <div class="mx-auto container text-center">
                
        
        <?php if(isset($_POST['order_status']) && $_POST['order_status'] == "not paid"){ ?>
          <?php $amount = strval($_POST['order_total_price']); ?>
          <?php $order_id = $_POST['order_id']; ?>
          <p>Total payment: $ <?php echo $_POST['order_total_price']; ?></p>
          <!-- <input type="submit" class="btn btn-primary" value="Pay Now"/> -->
          <div class="paypal-btn">
            <div id="paypal-button-container" ></div>
          </div>   

        <?php }else if(isset($_SESSION['total']) && $_SESSION['total'] != 0){ ?>
          <?php $amount = strval($_SESSION['total']); ?>
          <?php $order_id = $_SESSION['order_id']; ?>
          <p>Total payment: $ <?php echo $_SESSION['total']; ?></p>
          <!-- <input type="submit" class="btn btn-primary" value="Pay Now"/> -->
          <div class="paypal-btn">
            <div id="paypal-button-container" ></div>
          </div>        
          
                
        <?php }else { ?>
          <p>You don't have any order!</p>
        <?php } ?>
        
      </div>
    </section>

    <!-- PayPal SDK -->
    <script src="https://www.paypal.com/sdk/js?client-id=AeMgeSWFudNn7CCcrPeePM0NS7btB_aqB4XDq-D7OSav7dtizZ8f0EnfqJFkK0FmNbxUHX9cmbbI9DkS&currency=USD"></script>

    <script>
      paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?php echo $amount; ?>'
                    }
                }]
            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                console.log('Capture result', details, JSON.stringify(details, null, 2));
                var transaction = details.purchase_units[0].payments.captures[0];
                alert('Transaction ' + transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
                

                window.location.href = "server/complete_payment.php?transaction_id="+transaction.id+"&order_id="+<?php echo $order_id; ?>;

            });
        }
      }).render('#paypal-button-container');
    </script>
    
<?php include('layouts/footer.php'); ?>
