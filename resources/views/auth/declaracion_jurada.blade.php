<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Declaración Jurada</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h1 class="card-title text-center">Declaración Jurada</h1>
                <p class="card-text">Por favor, confirme que los datos con los que se ha logueado le pertenecen marcando el siguiente checkbox:</p>
                <form action="{{ route('declaracion.confirm') }}" method="POST">
                    @csrf
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="confirmCheckbox" name="confirmCheckbox" required>
                        <label class="form-check-label" for="confirmCheckbox">Confirmo que soy la persona con este DNI: <strong>{{ $user_name }}</strong></label>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Continuar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>