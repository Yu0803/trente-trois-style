<!-- サイドバー -->
<aside class="sidebar p-4 bg-white shadow-sm" style="width: 250px; min-height: 100vh;">
    <div class="mb-4 text-center">
        
        <h5>Trente-trois style</h5>
    </div>

    <nav class="mb-4">
        <ul class="list-unstyled">
            <div class="list-group">
                <a href="{{ route('admin.orders.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-bag-fill me-1"></i> Order Management
                </a>
                <a href="{{ route('admin.products.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-shirt me-1"></i> Product Management
                </a>
                <a href="{{ route('admin.payments.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-credit-card-2-front-fill me-1"></i> Payment Management
                </a>
                <a href="{{ route('admin.customers.index') }}"
                    class="list-group-item list-group-item-action"
                    style="white-space: nowrap;">
                    <i class="bi bi-person-fill me-1"></i> Customer Management
                </a>
                <a href="{{ route('admin.reviews.index') }}" class="list-group-item list-group-item-action">
                    <i class="bi bi-pencil-square me-1"></i> Review Management
                </a>
            </div>

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
