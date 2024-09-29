<div>
    <p class="title">Fees</p>
    
        <link rel="stylesheet" href="{{URL::asset('public/css/code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css')}}" />
         
         <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
         



             <div class="row">
            <br>
            <div class="col-sm-12">
                <p class="fees">Tution Fees</p>
            </div>
           
            <?php
                $min_fees = DB::table('courses')->MIN('fees');
                
               $max_fees = DB::table('courses')->MAX('fees');
              //  dd($max_fees);
              ?>
          <div class="col-sm-12">
              <div class="form-price-range-filter">
            
                
        <script >
            $(function() {
            var   min = '<?php echo "$min_fees"; ?>';
             var  max = '<?php echo "$max_fees"; ?>';
              min = parseInt(min);
              max = parseInt(max);
            $( "#slider-range" ).slider({
              range: true,
              min:min  ,
              max:max  ,
              values: [min, max],
              slide: function( event, u ) {
               var a =  $( "#min_price" ).val('$ '+u.values[0]);
               var b = $( "#max_price" ).val('$ '+u.values[1]);
              
              },
              });
            });
          </script>
                  <div>
                      <input type="text" id="min_price" name="tution_min_price" placeholder="<?php echo '$ '.$min_fees; ?>">
                      <div id="slider-range"></div>
                      
                      <input type="text" id="max_price" name="tution_max_price" placeholder="<?php echo '$ '.$max_fees; ?>">
                  </div>
                  {{-- <div>
                      <input type="submit" name="submit_range" value="Filter Product" class="btn-submit">
                  </div> --}}
            </div>
          </div>
          </div> 







          <div class="row" style="margin-bottom:25px;">


            <br>
            <div class="col-sm-12">
                <p class="fees">Application Fee</p>
            </div>
            <div class="col-sm-12">
                <?php
                $application_min_fees = DB::table('courses')->MIN('application_fee');
                $application_max_fees = DB::table('courses')->MAX('application_fee');
                // dd($application_min_fees);
                ?>
                <script>
                 $(function() {
                    var min = '<?php echo "$application_min_fees"; ?>';
                    var max = '<?php echo "$application_max_fees"; ?>';
                    min = parseInt(min);
                    max = parseInt(max);
                  $( "#slider-range2" ).slider({
                    range: true,
                    min:min  ,
                    max:max  ,
                    values: [min, max],
                    slide: function( event, u ) {
                      $( "#application_min" ).val('$ '+u.values[0]);
                      $( "#application_max" ).val('$ '+u.values[1]);
                    },
                    });
                  });
                </script>
                <div class="form-price-range-filter">
                    <div >
                        <input type="text" id="application_min" name="application_min" placeholder="<?php echo'$ '.$application_min_fees; ?>">
                        <div id="slider-range2"></div>
                        
                        <input type="text" id="application_max" name="application_max"placeholder="<?php echo '$ '.$application_max_fees; ?>">
                    </div>      
              </div>
            </div>
          </div>
        




        
</div>