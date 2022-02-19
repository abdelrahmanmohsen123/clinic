<script type="text/javascript" src="{{ asset('assets/dashboard/scripts/main.js') }}"></script>
<script src="{{asset('assets/dashboard/jquery/jquery.min.js') }}"></script>
<script src="{{asset('assets/dashboard/datatable/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('assets/dashboard/datatable/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/dashboard/datatable/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{asset('assets/dashboard/datatable/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/dashboard/datatable/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
<script src="{{asset('assets/dashboard/datatable/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
<script src="{{asset('assets/dashboard/datatable/datatables-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{asset('assets/dashboard/datatable/datatables-buttons/js/buttons.print.min.js') }}"></script>

<script src="{{asset('assets/dashboard/scripts/loader.js')}}" type="text/javascript"></script>

<script>
         $('#inputGroupFile02').on('change',function(){
                        var fileName = $(this).val();
                        $(this).next('.custom-file-label').html(fileName);
                    })
</script>
<script>

(function() {
                        'use strict';
                        window.addEventListener('load', function() {
                            var forms = document.getElementsByClassName('needs-validation');
                            var validation = Array.prototype.filter.call(forms, function(form) {
                                form.addEventListener('submit', function(event) {
                                    if (form.checkValidity() === false) {
                                        event.preventDefault();
                                        event.stopPropagation();
                                    }
                                    form.classList.add('was-validated');
                                }, false);
                            });
                        }, false);
                    })();
    </script>


@yield('custom-script')





</body>
</html>
