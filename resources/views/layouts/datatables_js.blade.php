<!-- Datatables -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.colVis.min.js"></script>
<script src="{{ asset('js/buttons.server-side.js') }}"></script>

<script>
    function initICheck(){
        console.log('initICheck');
        $('input[type="checkbox"].permission').on('ifCreated', function (event) {
            var checkbox = $(this);
            var roleName = $(this).data('role-name');
            var permission = $(this).data('permission');
            if (permission.roles.indexOf(roleName) > -1) {
                checkbox.iCheck('check');
            }
        });



        $('.icheck input').iCheck({
            checkboxClass: 'icheckbox_minimal-orange',
            radioClass: 'iradio_minimal-orange'
        });


        $('input[type="checkbox"].permission').on('ifClicked', function (event) {
            var url = "";
            var roleId = $(this).data('role-id');
            var permission = $(this).data('permission');
            if ($(this).parent('[class*="icheckbox"]').hasClass("checked")) {
                url = "{{url('api/permissions/revoke-permission-to-role')}}";
            } else {
                url = "{{url('api/permissions/give-permission-to-role')}}";
            }
            $.ajax({
                method: "POST",
                url: url,
                data: {
                    _token: "{{csrf_token()}}", 
                    roleId: roleId, 
                    permission: permission.permission
                }
            })
            .fail(function(msg) {
                console.log(msg);
            })
            .done(function(msg) {
                console.log(msg);
            });

            console.log('clicked');
        });
    }

    function renderiCheck(tableId){
        initICheck();

        $("#" + tableId).on( 'draw.dt', function () {
            initICheck();
        } );
    }

    $(document).ready(function() { 
        $.fn.dataTableExt.sErrMode = 'none';                 
    });
</script>