<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sticky Footer</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    html, body {
      height: 100%;
    }
    body {
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
  </style>
</head>
<body>

  <!-- Sticky Footer --->
  <div class="container border-top border-dark text-center mt-4">
    <footer class="footer py-3 mt-auto">
        <span class="text-center text-body-secondary">
          <span>© Copyright<span>
          <a href="https://mausam.imd.gov.in/kolkata/" class="text-decoration-none link-secondary" target="_blank">
            Regional Meteorological Centre Kolkata
          </a>
        </span>  
    </footer>
  </div>

  <!-- Bootstrap JS (optional) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
