<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KiDDO MARKET</title>

    <!-- Icon Web -->
    <link rel="shortcut icon" href="../img/k-removebg-preview.png" type="image/x-icon">

    <!-- Bootstrap Icons & Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- CSS Link -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/sidebars.css">

</head>
<body>

    @include('partials.navbar')

    <div class="theme dropdown position-fixed end-0 bottom-0 me-4 mb-4">
        <button class="btn btn-secondary dropdown-toggle p-2 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-brightness-high fs-5"></i>
        </button>
        <ul class="dropdown-menu mb-1">
            <li><button class="dropdown-item" id="lightTheme"><i class="bi bi-brightness-high fs-5 me-2"></i>Light</button></li>
            <li><button class="dropdown-item" id="darkTheme"><i class="bi bi-moon fs-5 me-2"></i>Dark</button></li>
        </ul>
    </div>

    <div class="container-fluid m-0 mt-3">
        @yield('container')
    </div>

    <div class="toast-container position-fixed bottom-0 start-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="../img/k-removebg-preview.png" class="rounded me-2" height="30" width="30" alt="...">
                <strong class="me-auto">KiDDO STORE</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <!-- Konten pesan toast akan ditampilkan di sini -->
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.23/dist/sweetalert2.all.min.js"></script>
    <script src="../js/script.js"></script>
    <script>
        const lightThemeButton = document.getElementById('lightTheme');
        const darkThemeButton = document.getElementById('darkTheme');
        const body = document.documentElement;
        const iconElement = document.querySelector('.dropdown-toggle .bi');

        lightThemeButton.addEventListener('click', () => {
            body.setAttribute('data-bs-theme', 'light');
            iconElement.classList.remove('bi-moon');
            iconElement.classList.add('bi-brightness-high');
        });

        darkThemeButton.addEventListener('click', () => {
            body.setAttribute('data-bs-theme', 'dark');
            iconElement.classList.remove('bi-brightness-high');
            iconElement.classList.add('bi-moon');
        });

        $(document).ready(function() {
            $('.favorite-form, .favorite-button').on('click', function(e) {
                e.preventDefault();

                var productId = $(this).data('product-id');
                var url = "{{ route('favorite.add', ':id') }}";
                url = url.replace(':id', productId);

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {_token: "{{ csrf_token() }}"},
                    success: function(response) {
                        // Tampilkan pesan pada elemen toast-body
                        $('#liveToast .toast-body').text(response.message);
                        // Tampilkan toast
                        $('#liveToast').toast('show');
                    },
                    error: function(xhr) {
                    // Tangani kesalahan jika item sudah ada di favorit
                        if (xhr.status === 400) {
                            $('#liveToast .toast-body').text(xhr.responseJSON.message);
                            $('#liveToast').toast('show');
                        }
                    }
                });
            });
        });

        $(document).ready(function() {
            $('.btn-delete').on('click', function(e) {
                e.preventDefault();

                var form = $(this).closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "this product will be deleted from favorites",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                            Swal.fire(
                            'Deleted!',
                            'Your product was removed from favorites',
                            'success'
                            )
                        }
                });
            });
        });
    </script>
    <script src="../../js/sidebars.js"></script>
</body>
</html>
