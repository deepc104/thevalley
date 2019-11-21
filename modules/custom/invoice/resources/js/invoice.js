(function ($, Drupal) {
    Drupal.behaviors.invoice = {
        attach: function (context, settings) {
            $('.datePicker').datepicker({ 
				dateFormat: 'yy-mm-dd', 
			});
			if($('.remove-btn').length){
				$('.remove-btn').on('click', function(event){
					event.preventDefault();
					var row = $(this).data('row');
					var removed_items = $('.removed_items').val();
					if(removed_items != ''){
					    removed_items = removed_items +','+row;
					}else{
					   removed_items = row;
					}
					$('.removed_items').val(String(removed_items));
					$('.field-desc-'+row).prop('required', 'false');
					$('.list-item-fieldset-'+row).remove();
					calculateTotal();
				});
			}
			
			$(".calculate_field").once('checkifnumeric').on('blur', function(e){
				 checkIsNumeric($(this), e);
			});
			$(".calculate_field").once('calculate_field').on('keyup', function(){
				calculateSubTotal($(this));
			});
			
             function calculateSubTotal(input){
			     var parentWrap =  input.closest('.fieldset-wrapper');
				 var unitCost = parentWrap.find('.field-unitcost').val();
				 var quantity = parentWrap.find('.field-quantity').val();
				 var subtotal = parseFloat(unitCost)*parseFloat(quantity);
				 if(!$.isNumeric(subtotal)){subtotal = 0;}
				 parentWrap.find('.field-subtotal').val(subtotal.toFixed(2));
				 calculateTotal();
			 }				 
			
			function calculateTotal(){
				  var subTotal = 0;
				  var tax      = parseFloat($('.field-tax').val());
				  var discount = parseFloat($('.field-discount').val());
				  $('.field-subtotal').each(function(){
				      subTotal = subTotal + parseFloat($(this).val());
				  });
				  var discountVal = convertPercentToValue(discount, subTotal);
				  // 
				  var discountedSubtotal = 	parseFloat(subTotal) - discountVal;
				  var taxVal = convertPercentToValue(tax, discountedSubtotal);
				  var finalTotal = discountedSubtotal + taxVal;
				  
			      $('.field-total').val(finalTotal.toFixed(2));
			}
			
			function convertPercentToValue(perc, amount){
			    return parseFloat((amount/100)*perc);
			}
			
			function checkIsNumeric(input, e){
			  var parentWrap =  input.closest('.fieldset-wrapper');
			  var num = input.val(); 
			  var isValid = true;
			  
			   if (!$.isNumeric(num)) {
                    isValid = false;
                    input.focus();
					parentWrap.find('.error-msg').html('<p class="text-danger">Please enter valid data</p>');
                }
                else {
                    parentWrap.find('.error-msg').html('');
                }
			  
			  if (isValid == false)
                e.preventDefault();
			}
			
			$('.button--primary.form-submit').on('click', function(e){
				$('.fieldset-wrapper').each(function () {
					var parentWrap = $(this);
					 parentWrap.find('input').each(function (){
	 					var isValid = true;
						if ($(this).val() == '' || $(this).val() == "undefined" || $(this).val() == "NaN") {
							isValid = false;
							parentWrap.find('.error-msg').html('<p class="text-danger">Please enter valid data</p>');
							$(this).focus();
						}
						else {
							parentWrap.find('.error-msg').html('');
						}
					  
					    if (isValid == false)
						  e.preventDefault();
				    });
				
			    });
		  });
		  
		  /*
		  var doc = new jsPDF();
				var specialElementHandlers = {
				    '#editor': function (element, renderer) {
				        return true;
				    }
				};	
          $('#download-pdf').once('pdf-dwnload').on('click', function(e){
				var html = $('.invoice-wrapper').html();
				
				doc.fromHTML(html, 5, 5, {
				   'width': 100,
				    'elementHandlers': specialElementHandlers
				    });
				doc.setFont("helvetica");
				doc.setFontType("normal");
				doc.setTextColor(0, 255, 0);				
			    doc.save($(this).data('file')+'pdf');
				
		  });*/


		  			
        }
    };
    
})(jQuery, Drupal);