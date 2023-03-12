
<!-- Navigation -->
     
           
 @auth
            @if (Auth::user()->role == 'masyarakat') 
            <nav class="navbar navbar-expand-md tm-navbar" id="tmNav">              
        <div class="container">   
          <div class="tm-next">
              <a href="#hero" class="navbar-brand">The Town</a>
          </div>             
            
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars navbar-toggler-icon"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="/pengaduan">Pengaduan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="/pengaduan/create">Buat Pengaduan</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link tm-nav-link" href="/logout">Log Out</a>
              </li>
              
              

            @endif
            @endauth