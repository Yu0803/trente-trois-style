<!-- サイドバー -->
<aside class="sidebar p-4 bg-white shadow-sm" style="width: 250px; min-height: 100vh;">
    <div class="mb-4 text-center">
        
        <h5>Trente-trois style</h5>
    </div>

    <nav class="mb-4">
        <ul class="list-unstyled">
            <li><a href="#" class="d-block py-2"><i class="fa-solid fa-box"></i> Order Management</a></li>
            <li><a href="#" class="d-block py-2"><i class="fa-solid fa-shirt"></i> Product Management</a></li>
            <li><a href="#" class="d-block py-2"><i class="fa-solid fa-credit-card"></i> Payment Management</a></li>
            <li><a href="#" class="d-block py-2"><i class="fa-solid fa-user"></i> Customer Management</a></li>
            <li><a href="#" class="d-block py-2"><i class="fa-solid fa-pen-to-square"></i> Review Management</a></li>
        </ul>
    </nav>

    <div class="mt-auto">
        <div class="mb-2 text-center small">admin@gmail.com</div>
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button class="btn btn-outline-secondary w-100">Logout</button>
        </form>
    </div>
</aside>
