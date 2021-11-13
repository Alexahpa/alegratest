<div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">

                        <a class="nav-link {{ $tab === "orders" ? "active" : "" }}" href="/orders">Ordenes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $tab === "recipes" ? "active" : "" }}" href="/recipes">Recetas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $tab === "purchases" ? "active" : "" }}" href="/purchases">Historial de Compras</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ $tab === "stock" ? "active" : "" }}" href="/stock">Stock de Ingredientes</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
