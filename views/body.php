<body class="m-0">
    <?php include_once './views/header.html'; ?>
    
    <div class="m-3 alert alert-success alert-dismissible fade show" role="alert">
        This page is built with <a href="https://getbootstrap.com/docs/5.0/getting-started/introduction/" class="alert-link" target="_blank">Bootstrap 5!</a>&nbsp;
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <div class="card text-dark bg-light ms-3 mb-3" style="max-width: 25rem;">
        <div class="card-body">

            <?php include_once './views/form.php'; ?>

        </div>    
    </div>

    <!-- <\?php include_once './views/gridContainer.html'; ?> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>