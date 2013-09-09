(function($) {
  Drupal.behaviors.forms = {
    attach: function(){
      //reorder fields more logically
      $('#webform-component-Country').insertAfter('#webform-component-Phone');
      $('#webform-component-State').insertAfter('#webform-component-Country');
      $('#webform-component-PostalCode').insertAfter('#webform-component-State');
      $('#webform-component-City').insertAfter('#webform-component-PostalCode');
      $('#webform-component-Street').insertAfter('#webform-component-City');
       
      //set up field vars
      var $wfc_country = $('#webform-component-Country');
      var $wfc_state = $('#webform-component-State');
      var $country_dd = $('#webform-component-Country').find('select').eq(0);
      var $state_dd = $('#webform-component-State').find('select').eq(0);
       
      //set up array vars for province entries and dummy elements to hold unused options
      var province_array = ['AB', 'BC', 'MB', 'NL', 'NB', 'NS', 'NT', 'NU', 'ON', 'PE', 'QC', 'SK', 'YT'].sort();
      var province_el_array = $('<select>').attr('id','province_els');
      var state_el_array = $('<select>').attr('id','state_els');
       
      //toggle show/hide of state field, and display error if necessary as well
      //we don't actually do validation of the state field in Drupal so this is just a really good show
      function state_toggle_and_reparent() {
                  if ($country_dd.val() == "United States" || $country_dd.val() == "USA" || $country_dd.val() == "Canada" || $country_dd.val() == "CAN")
                              {
                                if (!$wfc_state.find('label span').length) {
                                  $wfc_state.find('label').eq(0).append('<span class="form-required" title="This field is required.">*</span>');
                                }
                              $state_dd.addClass('required');
                              if ($('input.error').length > 0)
                                          { $state_dd.addClass($state_dd.val() == '' ? 'error' : ''); }
                              }
                  else
                              {
                              $wfc_state.find('label').eq(0).find('span').remove()
                              $state_dd.removeClass('required');
                              }
                  state_reparent();
      }
       
      //reset option arrays for states and provinces (Canada / US)
      //move those we're not using into another select element, move those we are using
      //back under the state dropdown
      function state_reparent(){
                  $('#edit-submitted-state').find('option').each(function(){
                              if ($(this).val() != '' && $.inArray($(this).val(),province_array) > -1)
                              {province_el_array.append($(this));}
                              else if ($(this).val() != '')
                              {state_el_array.append($(this));}
                  });
                  if ($country_dd.val() == "United States" || $country_dd.val() == "USA")
                  {$state_dd.append($(state_el_array).children());}
                  else if ($country_dd.val() == "Canada" || $country_dd.val() == "CAN")
                  {$state_dd.append($(province_el_array).children());}
      }
       
      $country_dd.bind('change',function(){state_toggle_and_reparent();});
      state_toggle_and_reparent();
    }}}
)(jQuery);
