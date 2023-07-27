  <!-- Vendor JS Files -->
  <script src="{{asset('beranda/assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
  <script src="{{asset('beranda/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('beranda/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('beranda/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('beranda/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('beranda/assets/js/main.js')}}"></script>

  {{-- Pencarian Pengumuman --}}
  <script>
    const searchInput = document.getElementById('searchInput');
    const testimonialItems = document.querySelectorAll('.testimonial-item');

    searchInput.addEventListener('input', function(event) {
        const searchValue = event.target.value.toLowerCase();

        testimonialItems.forEach(function(item) {
            const name = item.querySelector('h3').textContent.toLowerCase();
            const nisn = item.querySelector('h4').textContent.toLowerCase();

            if (name.includes(searchValue) || nisn.includes(searchValue)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

    testimonialItems.forEach(function(item) {
        const name = item.querySelector('h3').textContent;
        item.addEventListener('click', function() {
            alert('Nama: ' + name);
        });
    });
</script>
