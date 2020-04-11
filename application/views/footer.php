 <div class="mj_footer mj_toppadder80 mj_bottompadder80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 col-lg-offset-2 col-md-offset-2 col-sm-offset-0 col-xs-offset-0">
                    <div class="mj_weight mj_bottompadder20">
                        <div class="mj_sociallink">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="mj_copyright">
                        <p><p>&copy; <?=date('Y');?> - Online Job Vacancy<br>Build With <i class="fa fa-heart"></i> by <a href="https://winsekai.my.id" target="_blank">Edwin Heriyansyah</a>
                        </p>
                        <span class="glyphicon glyphicon-option-horizontal" aria-hidden="true"></span>
                    </div>
                </div>
                <div class="totop">
                    <div class="gototop">
                        <a href="#">
                            <i class="fa fa-angle-up"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Script Start -->
    <script src="<?=base_url();?>assets/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/bootstrap/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?=base_url();?>assets/js/bootstrap.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/modernizr.custom.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/rsslider/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/rsslider/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/rsslider/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/rsslider/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/rsslider/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="<?=base_url();?>assets/js/plugins/rsslider/revolution.extension.slideanims.min.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/countto/jquery.countTo.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/plugins/owl/owl.carousel.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/plugins/bootstrap-slider/bootstrap-slider.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/plugins/fancybox/jquery.fancybox.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/plugins/fancybox/jquery.fancybox.pack.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/jquery.mixitup.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/plugins/jquery-ui/jquery-ui.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/isotop/isotope.pkgd.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/ckeditor/ckeditor.js"></script>
    <script src="<?=base_url();?>assets/js/plugins/ckeditor/adapters/jquery.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBTgeRi4UiqfMmuaVsjsF2x2PhsldbQtjc"></script> 
    <script src="<?=base_url();?>assets/js/gmaps.js" type="text/javascript"></script>
    <script src="<?=base_url();?>assets/js/custom.js" type="text/javascript"></script>


    <script>
        $('#error').on('click',function(){
             swal("Maaf!", "Harap Mendaftar Dahulu!", "error");
        });
    </script>
    <!-- Script End -->

    <script type="text/javascript">
        $('#my_modal').on('show.bs.modal', function(e) {
        /*var bookId = $('.cek_apply').attr('data-book-id');
        $(e.currentTarget).find('input[name="bookId"]').val(bookId);
        var bookLowongan = $('.cek_apply').attr('data-book-lowongan');
        $(e.currentTarget).find('input[name="bookLowongan"]').val(bookLowongan);*/
        });

        /*$('#my_modal').on('show.bs.modal', function(e) {
        var bookId = $(e.relatedTarget).data('book-id');
        $(e.currentTarget).find('input[name="bookId"]').val(bookId);
        var bookLowongan = $(e.relatedTarget).data('book-lowongan');
        $(e.currentTarget).find('input[name="bookLowongan"]').val(bookLowongan);
        });*/

        /*$('#my_info').on('show.bs.modal', function(e) {
        var idLowongan = $(e.relatedTarget).data('book-id');
        var syaratLowongan = $(e.relatedTarget).data('syarat-id');
        $(e.currentTarget).find('input[name="infoLowongan"]').val(idLowongan);
        $(e.currentTarget).find('label[class="syaratLowongan"]').val(syaratLowongan);
        });*/
    </script>

    <script type="text/javascript">
        function checkPass()
            {
                var pass1 = document.getElementById('pass1');
                var message = document.getElementById('error-nwl');
                var goodColor = "#66cc66";
                var badColor = "#ff6666";
                
                if(pass1.value.length > 5)
                {
                    pass1.style.backgroundColor = goodColor;
                    message.style.color = goodColor;
                    message.innerHTML = '<label class="text-success"><span><i class="fa fa-check-circle-o" aria-hidden="true"></i> Ok!!</span></label>'
                }
                else
                {
                    pass1.style.backgroundColor = badColor;
                    message.style.color = badColor;
                    message.innerHTML = '<label class="text-danger"><span><i class="fa fa-times" aria-hidden="true"></i> Password minimal 6 karakter</span></label>'
                    return;
                }
            }  

        function validate(evt) {
              var theEvent = evt || window.event;

              // Handle paste
              if (theEvent.type === 'paste') {
                  key = event.clipboardData.getData('text/plain');
              } else {
              // Handle key press
                  var key = theEvent.keyCode || theEvent.which;
                  key = String.fromCharCode(key);
              }
              var regex = /[0-9]|\./;
              if( !regex.test(key) ) {
                theEvent.returnValue = false;
                if(theEvent.preventDefault) theEvent.preventDefault();
              }
            }
    </script>

 <script type="text/javascript">
    $('.form_date').datetimepicker({
        pickTime: false,
        minView: 2,
        format: 'yyyy-mm-dd',
        autoclose: true,
    });
</script>

<script>
        jQuery(document).ready(function($) {
            // map marker js

            var map = new GMaps({
                el: '#map',
                lat: -12.043333,
                lng: -77.028333,
                panControl : false,
        streetViewControl : false,
        mapTypeControl: false,
        overviewMapControl: false,
        scrollwheel: false,
        draggable:false,
        navigationControl: false,
        scaleControl: false,
        zoomControl: false,
        disableDoubleClickZoom: true
            });
            map.addMarker({
                lat: -12.043333,
                lng: -77.03,
                title: 'Web Designer',
                infoWindow: {
                    content: '<h6>Web Designer</h6><p>Dropbox Inc.</p>',
                }
            });
            map.addMarker({
                lat: -12.042,
                lng: -77.028333,
                title: 'Web Deveoloper',
                infoWindow: {
                    content: '<h6>Web Developer</h6><p>Dropbox Inc.</p>'
                }
            });
        });
    </script>
    
    <script type="text/javascript">
        $("input[type='file']").on("change", function () {
     if(this.files[0].size > 1000000) {
       alert("Mohon unggah ukuran dibawah 1 MB. Terima Kasih!!");
       $(this).val('');
     }
     if ($('#inputGroupFile01').get(0).files.length === 0) {
        alert("Mohon upload file Ijazah.");
     }

     if ($('#inputGroupFile02').get(0).files.length === 0) {
        alert("Mohon upload file KTP.");
     }
    });
    </script>
    
    <script type="text/javascript">
        // jQuery plugin to prevent double submission of forms
jQuery.fn.preventDoubleSubmission = function() {
  $(this).on('submit',function(e){
    var $form = $(this);

    if ($form.data('submitted') === true) {
      // Previously submitted - don't submit again
      e.preventDefault();
    } else {
      // Mark it so that the next submit can be ignored
      $form.data('submitted', true);
    }
  });

  // Keep chainability
  return this;
};
    </script>
    
     <script type="text/javascript">
   var submitted = false;
document.querySelector('#add-form').addEventListener('submit',function(evt) {
  if(submitted) {
    evt.preventDefault();
    console.log(submitted);
  } else {
    submitted = true;
    this.querySelector('fieldset').setAttribute('disabled','disabled');
  }
});
</script>

<script>
var input = document.getElementById('pass1'),
    icon = document.getElementById('icon');

   icon.onclick = function () {

     if(input.className == 'form-control active') {
        input.setAttribute('type', 'text');
        icon.className = 'fa fa-eye';
       input.className = 'form-control';

     } else {
        input.setAttribute('type', 'password');
        icon.className = 'fa fa-eye-slash';
       input.className = 'form-control active';
    }
}
</script>



</body>
</html>