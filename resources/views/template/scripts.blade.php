
    <script src="{{asset('assets/dashboard/assets/js/bootstrap.js')}}"></script>
    <script src="{{asset('assets/dashboard/assets/js/app.js')}}"></script>

{{-- <!-- Need: Apexcharts -->
<script src="{{asset('assets/dashboard/assets/extensions/apexcharts/apexcharts.min.js')}}"></script>
<script src="{{asset('assets/dashboard/assets/js/pages/dashboard.js')}}"></script> --}}

<script src="{{asset('assets/dashboard/assets/extensions/sweetalert2/sweetalert2.min.js')}}"></script>




@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ session("success") }}'
        });
    </script>
@endif


    @if (session('warning'))
    <script>
        Swal.fire({
            icon: 'warning',
            title: 'Warning',
            text: '{{ session('warning') }}'
        });
    </script>
@endif


@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ $errors->first() }}'
        });
    </script>
@endif

<script>
    function confirmLogout() {
        Swal.fire({
            title: 'Konfirmasi Logout',
            text: 'Anda yakin ingin logout?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Logout',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('logout-form').submit();
            }
        });
    }
</script>




