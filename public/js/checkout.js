Stripe.setPublishableKey('pk_test_51Hf8Z1CBbAN4AahF9kjGITJKAWZ8wGekkcm7RaVHaYoM6i29uNhDbSe7xZfgeuLtrneEorBed4ZzOekBWUusdCZP00UytqDfy4');

var $form = $('#checkout-form');
$form.submit(function(event){
    $('#charge-error').addClass('hidden');
    $form.find('button').prop('disabled', true);
Stripe.card.createToken({
  
      number: $('#card-number').val(),
      exp_month: $('#card-expiry-month').val(),
      exp_year: $('#card-expiry-year').val(),
      cvc: $('#card-cvc').val(),
      name: $('#card-name').val()
   
  }, stripeResponseHandler);
    return false;
});
 function stripeResponseHandler(status, response){
     if(response.error){
         $('#charge-error').removeClass('hidden');
         $('#charge-error').text(response.error.message);
         $form.find('button').prop('disabled', false)
     }else{
         var token = response.id;
         $form.append($('<input type="hidden" name="stripeToken" />').val(token));

         //submit the form
         $form.get(0).submit();
     }

 }