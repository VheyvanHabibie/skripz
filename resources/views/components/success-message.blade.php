@php
$message =
    [
        'store' => 'Berhasil menambahkan data.',
        'update' => 'Berhasil mengedit data.',
        'destroy' => 'Berhasil menghapus data.',
    ][$action] ?? '';
@endphp
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "{{ $message }}"
    });
</script>
